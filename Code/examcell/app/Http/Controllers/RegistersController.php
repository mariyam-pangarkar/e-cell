<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
use Auth;

use Illuminate\Support\Facades\Hash;    
 

class RegistersController extends Controller
{
    
   public function showRegisterForm(){
       return view('register');
   }
   public function register(Request $request){
    $this->validation($request);
    $request['password']=bcrypt($request->password);
    User::create($request->all());
    return redirect('/')->with('status','you are registed');
}





  
public function showLoginForm(){
    return view('login');
}
public function login(Request $request){
 $this->validate($request,[
    'email'=>'required|email|max:255',
    'password'=>'required|max:255',
   
 ]);
if (Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
{
   return 'login successfully';
}

   return 'something wrong';
 //return redirect('/')->with('status','you are registed');
}

public function validation($request)
    {
       return $this->validate($request,[
       'name'=>'required|max:255',
        'email'=>'required|email|unique:users|max:255',
        'password'=>'required|confirmed|max:255',
         ]);
    
       }
}





