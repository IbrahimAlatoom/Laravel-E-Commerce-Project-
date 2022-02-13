<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //
    function login(Request $request){
        // To Return the request as Json
        // return $request->input();
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return "username or password incorrect";
        }else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }

    function signup(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password)
        ]);
        $request->session()->put('user',$user);
            return redirect('/');
    }
}
