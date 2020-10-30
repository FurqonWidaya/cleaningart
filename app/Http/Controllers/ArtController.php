<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
    
     public function maid (){
       return view ('art.home');
    }
        public function __construct()
    {
        $this->middleware('auth');
    }
     public function error()
    {
    	return view('art.404');
    }
    public function profil1($id)
    {       
       // dd($request->all())   ;
        return view('art.profil');
    }
    public function setting1($id){
        $users = \App\User::find($id);
        return view('art.edit', ['users' => $users]);
    }
    public function update1(Request $request, $id){
        //  $this->validate($request,[
        //     //'name' => 'required|min:4',
        //     //'nohp'=>'required|min:11|numeric',
        //     'username'=>'required|min:5|',
        //     'email'=>'required|email',
        //     //'password'=>'required|min:5',
        // ]);
        //dd($request->all());
        $users = \App\user::find($id);
        //$users->password = bcrypt($users->password);
        $users->update($request->all());
        return redirect('/profilku/{id}')->with('sukses', 'data berhasil diubah');
    }
}
