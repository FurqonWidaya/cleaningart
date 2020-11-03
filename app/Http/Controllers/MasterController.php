<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
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
    public function about()
    {
        return view('master.aboutus');
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
        $users = \App\user::find($id);
         $users->update($request->all());
       //  $user = \App\User::where('username', $request->username)
       //          ->where('password',md5($request->password))
       //          ->first();
       // if (!empty($user->id)) {
       //      $user->password = bcrypt($request->input('password'));
       //      $user->save();
       //  }
       //  $users->password = bcrypt($request->input('password'));
       //  $users->update($request->all());
        
        $master = \App\master::find($id);
        $master->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
            $master->foto = $request->file('foto')->getClientOriginalName();
            $master->save($request->all());}
        return redirect('/myprofil/{id}')->with('success', 'data berhasil diubah');
        // else{
        //     $art = \App\art::find($id);
        // $art->update($request->all());
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
        //     $art->foto = $request->file('foto')->getClientOriginalName();
        //     $art->save($request->all());}
        // return redirect('/myprofil/{id}')->with('success', 'data berhasil diubah');}
        }
    

    public function changepw($id)
    {       
       // dd($request->all())   ;
        return view('master.changepw');
    }

    public function postpass(Request $request)
    {
       // $user = \App\User::find($id);
        if(!(Hash::check($request->get('current_password'), Auth::User()->password))){
            return redirect('/myprofil/changepassword/{id}')->with('error', 'password tidak cocok');
        }
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect('/myprofil/changepassword/{id}')->with('error', 'password tidak sama dengan new password');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5'
        ]);
        $user = Auth::User();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return redirect('/myprofil/{id}')->with('message', 'password telah berganti');
    }
}
