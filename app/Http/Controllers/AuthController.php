<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Auth;
use Redirect; 
use Illuminate\Http\Request;

// use App\art;
// use App\master;
use App\User;
use DB;
class AuthController extends Controller
{
    //login all
    public function login (){
        return view ('auth.login');
    }
     public function postlogin (Request $request){

        if(Auth::attempt($request->only('username','password'))){
            return redirect('/dashboard');
           // return redirect('/home');
        }
        return redirect('/login');
        //dd($request->all());
         //$user = \App\User::All();
        //if(Auth::attempt($request->only('username','password'))){
        // if(Auth::attempt($request->only('username','password'))){
        //     $user = \App\User::where('username', $request->username)->first();
        //     if($user->role == 'admin'){
        //             Auth::guard('admin')->LoginUsingId($user->id);
        //             return redirect('/dashboard');
        //         } elseif($user->role == 'master'){
        //             Auth::guard('master')->LoginUsingId($user->id);
        //             dd($request->all());
        //         }elseif ($user->role == 'art') {
        //           Auth::guard('art')->LoginUsingId($user->id);
        //           dd($request->all());
        //         }
        //     }
    }
     public function logout (){
        Auth::logout();
        return redirect ('/login');
    }

    //admin
    public function adminregister (){
        return view ('/auth.register');
    }
    public function register (){
        return view ('/auth.registermaster');
    }
    public function postregister(Request $request){
         $user = \App\User::create($request->all());
         if ($request->has('submit')){
            $user ->password=bcrypt($user ->password);
            $user->remember_token = str_random(60);
             $user->save();
            
             return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
        }
}
        //master

    
        public function postregis(Request $request){
        //insert ke master
         $master = \App\master::create($request->all());
         //insert ke user
         $user = new \App\User;
         if ($request->has('submit')){
            $user ->role=('master');
            $user->name= $request->nama;
            $user->username= $request->username;
            $user->email=$request->email;
            $user ->password=bcrypt($user ->password);
            $user->remember_token = str_random(60);
             $user->save();
            
             return redirect('/login')->with('sukses','Akun Berhasil Dibuat');}
        }
    
}
