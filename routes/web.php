<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login',function(){
    return view('registration.login');
});
Route::get('/signup',function(){
    return view('registration.signup');
});
Route::get('/logout',function(){
    Session::forget('user');
    return redirect('/');
});
Route::post('/login',[UserController::class,'login']);
Route::post('/signup',[UserController::class,'signup']);

Route::get('/',[ProductController::class,'index']);
Route::get('/details/{id}',[ProductController::class,'details']);
Route::post('/add_to_cart',[ProductController::class,'addToCart']);
Route::get('/cartlist',[ProductController::class,'cartList']);
Route::delete('/removeitem/{id}',[ProductController::class,'destroy']);
Route::get('/order',[ProductController::class,'order']);
Route::post('/orderplace',[ProductController::class,'orderplace']);
Route::get('/myorders',[ProductController::class,'myOrders']);
