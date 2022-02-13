<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
    function index(){
        $products = Product::all();
        return view('products.product',['products'=>$products]);
    }

    function details($id){
        $product = Product::find($id);
        return view('products.details',['product'=>$product]);
    }

    function addToCart(Request $request){
        if($request->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();

            return redirect('/');
        }else{

            return redirect('login');
        } 
    }

    static function cartItem(){
        $userId= Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }

    function cartList(){
        if(session()->has('user')){
            
        $userId = Session::get('user')['id'];

        // Join Method 
        $products = DB::table('cart')->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)->select('products.*','cart.id as cart_id')->get();
        // return $products;
        return view('products.cartlist',['products'=>$products]);
        

        // // Eloquent Relation Method
        // $carts = User::with('cart')->where('id',$userId)->get()[0]->cart;
        // return $carts;
        // $products = Product::all();
        // $items = array();
        // foreach($carts as $cart){
        //     // echo $products->where('id',$cart->product_id)."<br>";
        //     // echo $products->find($cart->product_id)."<br>";
        //     // array_push($items,$products->where('id',$cart->product_id));
        //     array_push($items,$products->find($cart->product_id));
        // }        
        // return $items;
        // return view('products.cartlist',['products'=>$items]);

        }
        else{
            return redirect('login');
        }
    }

    function destroy($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect('cartlist');
    }

    function order(){
        if(session()->has('user')){
            $userId = Session::get('user')['id'];
            $total = DB::table('cart')->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)->sum('products.price');
            // return $total;
            return view('products.order',['total'=>$total]);
            }
            else{
                return redirect('login');
            }
    }

    function orderplace(Request $request){

        $userId = Session::get('user')['id'];
        $carts = Cart::where('user_id',$userId)->get();
        foreach($carts as $item){
            $order = new Order;
            $order->product_id = $item->product_id;
            $order->user_id = $item->user_id;
            $order->status = "pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->address = $request->address;
            $order->save();
        }
        Cart::where('user_id',$userId)->delete();
        return redirect('/');

    }
    function myOrders(){
        if(session()->has('user')){
            $userId = Session::get('user')['id'];
            $orders = DB::table('orders')->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)->get();
            // return $products;
            return view('products.myorders',['orders'=>$orders]);
            }
            else{
                return redirect('login');
            }

    }

    
}
