<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dataart(Request $request){
        if ($request->has('cari')){
            $data_art = \App\art::where('name', 'LIKE', '%' .$request->cari. '%')->get();
        }else{
            $data_art = \App\art::all();
        }
        return view('admin.dataart',['data_art' => $data_art]);
    }

    public function datamaster(Request $request){
        if ($request->has('cari')){
            $data_master = \App\master::where('name', 'LIKE', '%' .$request->cari. '%')->get();
        }else{
            $data_master = \App\master::all();
        }
        return view('admin.datamaster',['data_master' => $data_master]);
    }


    public function dashboard (){
       return view ('/admin.dashboard');
    }

    public function create(Request $request){
        //insert ketable art
        $art=\App\art::create($request->all());
        //insert ke table user
        $user = \App\User::create($request->all());
        $user->name= $request->name;
        $user->username= $request->username;
        $user->email=$request->email;
        $user->password = bcrypt($user->password);
        $user->remember_token = str_random(60);
       // $request->request->add(['user_id' => $user->id]);
         $user->save();
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
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $art->foto = $request->file('foto')->getClientOriginalName();
            $art->update($request->all());
            $art->save($request->all());
        }
        return redirect('/art')->with('sukses', 'data berhasil diubah');
    }

    public function profile($id){
        $art = \App\art::find($id);
        return view('admin.profile', ['art' => $art]);

    }
     public function profileku($id){
        $user = \App\User::find($id);
        return view('admin.profileadmin', ['users' => $user]);
    }
}