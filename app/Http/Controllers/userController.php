<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;


class userController extends Controller
{
    function login(Request $request){
        //return $request->email;
      //  $user=  User::where('email', $request->email)->first();
        $user =  User::where(['email'=> $request->email])->first();

       if(!$user || !Hash::check($request->password, $user->password)){
         return "password not match";

       }else{
            $request->session()->put('user', $user);
            return redirect('/');
       }


    }


}
