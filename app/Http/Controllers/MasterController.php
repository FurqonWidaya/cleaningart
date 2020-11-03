<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\User;
use App\master;
class MasterController extends Controller
{
    //midleware 
    public function __construct()
    {
    	$this->middleware('auth');
    }

    //error
    public function error()
    {
    	return view('master.404');
    }

    //about
    public function about()
    {
        return view('master.aboutus');
    }

    //profil
    public function profilku($id)
    {       
       // dd($request->all())   ;
        return view('master.profil');
    }

    //edit profil
    public function setting($id){
        $users = \App\User::find($id);
        return view('master.edit', ['users' => $users]);
    }

    //update profil
    public function update(Request $request, $id){
        $users = \App\user::find($id);
         $users->update($request->all());
        $master = \App\master::find($id);
        $master->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            $master->foto = $request->file('foto')->getClientOriginalName();
            $master->save($request->all());}
        return redirect('/myprofil/{id}')->with('success', 'data berhasil diubah');
        }
    
    //ganti password
    public function changepw($id)
    {       
        return view('master.changepw');
    }

    //update ganti password
    public function postpass(Request $request)
    {
        if(!(Hash::check($request->get('current_password'), Auth::User()->password))){
            return redirect()->back()->with('error', 'password tidak cocok');
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()->with('error', 'password tidak sama dengan new password');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5'
        ]);
        $user = Auth::User();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect('/dataku/{id}')->with('sukses', 'password telah berganti');
    }
}
