<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
     public function maid (){
       return view ('art.home');
    }
     public function error()
    {
    	return view('art.404');
    }
    public function profilku($id)
    {       
       // dd($request->all())   ;
        return view('art.profil');
    }
    public function setting($id){
        $users = \App\User::find($id);
        return view('art.edit', ['users' => $users]);
    }
    public function update(Request $request, $id){
        //dd($request->all());
        $users = \App\user::find($id);
        //$users->password = bcrypt($users->password);
        $users->update($request->all());
        return redirect('/myprofil/{id}')->with('sukses', 'data berhasil diubah');
    }
}
