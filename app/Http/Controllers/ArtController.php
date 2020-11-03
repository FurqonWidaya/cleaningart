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
        $users = \App\user::find($id);
        $users->update($request->all());
        return redirect('/profilku/{id}')->with('sukses', 'data berhasil diubah');
    }
}
