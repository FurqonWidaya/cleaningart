<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dataart(Request $request){
        if ($request->has('cari')){
            $data_art = \App\art::where('nama', 'LIKE', '%' .$request->cari. '%')->get();
        }else{
            $data_art = \App\art::all();
        }
        //dd($request->all());
        //$data_art = \App\art::all();
        return view('admin.dataart',['data_art' => $data_art]);
    }
     public function dashboard (){
       return view ('admin.dashboard');
    }

    //
    public function create(Request $request){
        //insert ketable art
        $art = \App\art::create($request->all());
        //insert ke table user
        $user = new \App\User;
        $user->role= 'art';
        $user->name= $request->nama;
        $user->username= $request->username;
        $user->email=$request->email;
        $user->password = bcrypt("12345");
        $user->remember_token = str_random(60);
        $user->save();
        $request->request->add(['user_id' => $user->id]);
        //$art=\App\art::create($request->all());
         if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $art->foto = $request->file('foto')->getClientOriginalName();
            $art->save();
        }
        return redirect('/art')->with('sukses','data berhasil ditambahkan');
    }

    public function edit($id){
        $art = \App\art::find($id);
        return view('admin.edit', ['art' => $art]);
    }

    public function update(Request $request, $id){
        //dd($request->all());
        $art = \App\art::find($id);
        $art->update($request->all());
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
        //     $art->foto = $request->file('foto')->getClientOriginalName();
        //     $art->save();
        // }
        return redirect('/art')->with('sukses', 'data berhasil diubah');

    }

    public function profile($id){
        $art = \App\art::find($id);
        return view('admin.profile', ['art' => $art]);

    }
     public function profile1($id){
        $user = \App\User::find($id);
        return view('admin.profileadmin', ['users' => $user]);

    }
}