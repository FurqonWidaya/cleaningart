<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    public function login (){
        return view ('auth.login');
    }
     public function postlogin (Request $request){
     	if(Auth::attempt($request->only('username','password'))){
     		return redirect('/dashboard');
     	}
     	return redirect('/login');
        //dd($request->all());
    }
     public function logout (){
        Auth::logout();
        return redirect ('/login');
    }
    public function register (){
        return view ('/auth.register');
    }
    public function postregister(Request $request){
         if ($request->has('submit')){
            \App\User::create($request->all());
             return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
        }
        return postregister::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->with(alert('Anda harus mengisi form dengan lengkap !'));  
    }
}
