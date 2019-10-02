<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
                                             
class RegistersController extends Controller
{
    
    public function store(request $request)
    {
    
            $name=$request->input('name');
            $email=$request->input('email');
            $password=$request->input('password');

            echo DB::insert ('insert into users(id,name,email,password) values(?,?,?,?)',[null,$name,$email,$password]);
        
    }
    public function login(request $request)
    {
    
            $email=$request->input('email');
            $password=$request->input('password');

            $data=DB::select('select id from users where email=? and password=?',[$email,$password]);
            
            if(count($data))
            {
                echo"You logged in successfully";
            }
            else{
                echo"please enter correct username and password";
            }
    }

}
