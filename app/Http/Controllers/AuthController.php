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
            'nohp'=>'required|min:11|max:13|regex:/(08)[0-9]{9}/',
          'username'=>'required|min:5|unique:users',
            'email'=>'required|email',
            'password'=>'required|min:5',

        ]);
        $user = new \App\User;
        if ($request->has('submit')){
          $user->role= $request->role;
          $user->email= $request->email;
          $user->username= $request->username;
          $user->password= $request->password;
          $user ->password=bcrypt($user ->password);
          $user->remember_token = str_random(60);
          $user->active_token=rand(100000,999999);
          //$user->active=null;
          $user->save();
          $request->request->add(['user_id'=> $user->id]);
          $master = \App\master::create($request->all());
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
         //$user->name= $request->name;
          $user->role= $request->role;
          $user->email= $request->email;
           $user->username= $request->username;
          $user->password= $request->password;
          $user ->password=bcrypt($user ->password);
            $user->remember_token = str_random(60);
             $user->save();
         // if ($request->has('submit')){
         //    $admin = \App\admin::create($request->all());
         // $admin->name= $request->name;
         //  $admin->email= $request->email;
         //   $admin->username= $request->username;
         //  $admin->password= $request->password;
         //  $admin ->password=bcrypt($user ->password);
         //     $admin->save();     
             
        //}
        return redirect('/login')->with('sukses','Akun Berhasil Dibuat');
    }
    
    
}
