<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $checkLogin =DB::table('users')->where(['name'=>$name,'password'=>$password])->get();
        if(count($checkLogin) >0)
        {
            echo "Login Successfully..";
        }
        else{
            echo "Login failed...Please try again!!";
        }

        
    }
}
