<?php

namespace App\Http\Controllers;
use Redirect; 
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class C_login extends Controller
{
    //login all
    public function klikLogin (){
        return view ('auth.v_login');
    }
    
     public function loginAction (Request $request){
        $user = \App\User::All();
        if(Auth::attempt($request->only('username','password'))){
            $user = \App\User::where('username', $request->username)->first();
            if($user->role == 'admin'){
                    //Auth::guard('admin')->LoginUsingId($user->id);
                    return redirect('/dashboard');
                } elseif($user->role == 'master'){
                    //Auth::guard('master')->LoginUsingId($user->id);
                    return redirect('/home');
                }elseif ($user->role == 'art') {
                // Auth::guard('art')->LoginUsingId($user->id);
                    return redirect('/index');
                  //dd($request->all());
                }
            }
            return redirect('/login')->with('error', 'Username atau Password salah silahkan isi kembali');
    }

    //logout all
     public function KlikLogout (){
        Auth::logout();
        return redirect ('/login');
    }
}