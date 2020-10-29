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
                    return redirect('/homes');
                  //dd($request->all());
                }
            }
            return redirect('/login')->with('error', 'Username atau Password salah silahkan isi kembali');
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
    //      $user = \App\User::create($request->all());
    //      if ($request->has('submit')){
    //         $user ->password=bcrypt($user ->password);
    //         $user->remember_token = str_random(60);
    //          $user->save();
    //          return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
    //     }
    // }

    public function postregis(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4',
            'nohp'=>'required|min:11|numeric',
            'username'=>'required|min:5|unique:users',
            'email'=>'required|email',
            'tanggallahir'=>'date',
            'password'=>'required|min:5',
        ]);
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
    
    
      public function postregister(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4',
            'username'=>'required|min:5|unique:users',
            'email'=>'required|email',
            'password'=>'required|min:5',
        ]);
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
            $admin = \App\admin::create($request->all());
         $admin->name= $request->name;
          $admin->email= $request->email;
           $admin->username= $request->username;
          $admin->password= $request->password;
          $admin ->password=bcrypt($user ->password);
             $admin->save();     
             return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
        }
    }
    
    
}
