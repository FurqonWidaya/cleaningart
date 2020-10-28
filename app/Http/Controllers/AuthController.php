<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
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
    //     if(Auth::attempt($request->only('username','password'))){
    //         return redirect('/dashboard');
    //     }
    //     return redirect('/login');
    // }
        $user = \App\User::All();
        if(Auth::attempt($request->only('username','password'))){
            $user = \App\User::where('username', $request->username)->first();
            if($user->role == 'admin'){
                    //Auth::guard('admin')->LoginUsingId($user->id);
                    return redirect('/dashboard');
                } elseif($user->role == 'master'){
                    //Auth::guard('master')->LoginUsingId($user->id);
                    return redirect('/master');
                }elseif ($user->role == 'art') {
                // Auth::guard('art')->LoginUsingId($user->id);
                    return redirect('/maid');
                  //dd($request->all());
                }
            }
            return redirect('/login')->with('error', 'akun tidak ditemukan');
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

    // public function postregister(Request $request){
    //      if ($request->has('submit')){
    //          $user = new \App\User;
    //         $user ->role=('admin');
    //         $user->name= $request->name;
    //         $user->username= $request->username;
    //         $user->email=$request->email;
    //         $user ->password=bcrypt($user ->password);
    //         $user->remember_token = str_random(60); 
    //         $user->save();
    //         $request->request->add(['user_id' => $user->id]);
    //         $admin = \App\admin::create($request->all()); 
    //         $user->save();
    //         }

    //         return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
    //     }

    // public function postregister(Request $request){
    //      $user = \App\User::create($request->all());
    //      if ($request->has('submit')){
    //         $user ->password=bcrypt($user ->password);
    //         $user->remember_token = str_random(60);
    //          $user->save();
    //          return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
    //     }
    // }

    public function postregis(Request $request){
        $user = \App\User::create($request->all());
         $user->name= $request->name;
          $user->role= $request->role;
          $user->email= $request->email;
           $user->username= $request->username;
          $user->password= $request->password;
          $user ->password=bcrypt($user ->password);
            $user->remember_token = str_random(60);
             $user->save();
         if ($request->has('submit')){
            $master = \App\master::create($request->all());
         $master->name= $request->name;
          $master->email= $request->email;
           $master->username= $request->username;
          $master->password= $request->password;
          $master ->password=bcrypt($user ->password);
            $master->remember_token = str_random(60);
             $master->save();
             
             return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
        }
    }
    
    
      public function postregis(Request $request){
        $user = \App\User::create($request->all());
         $user->name= $request->name;
          $user->role= $request->role;
          $user->email= $request->email;
           $user->username= $request->username;
          $user->password= $request->password;
          $user ->password=bcrypt($user ->password);
            $user->remember_token = str_random(60);
             $user->save();
         if ($request->has('submit')){
            $master = \App\master::create($request->all());
         $master->name= $request->name;
          $master->email= $request->email;
           $master->username= $request->username;
          $master->password= $request->password;
          $master ->password=bcrypt($user ->password);
            $master->remember_token = str_random(60);
             $master->save();
             
             return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
        }
    }
    
    
}
