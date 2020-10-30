<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterController extends Controller
{
     public function master (){
       return view ('master.homed');
    }
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function error()
    {
    	return view('master.404');
    }

    public function profilku($id)
    {       
       // dd($request->all())   ;
        return view('master.profil');
    }
    public function setting($id){
        $users = \App\User::find($id);
        return view('master.edit', ['users' => $users]);
    }
    public function update(Request $request, $id){
        //  $this->validate($request,[
        //     'name' => 'required|min:4',
        //     'nohp'=>'required|min:11|numeric',
        //     'username'=>'required|min:5|unique:users',
        //     'email'=>'required|email',
        //     'password'=>'required|min:5',
        // ]);
        //dd($request->all());
        $users = \App\user::find($id);
        //$users->password = bcrypt($users->password);
        $users->update($request->all());
        return redirect('/myprofil/{id}')->with('sukses', 'data berhasil diubah');
    }
}
