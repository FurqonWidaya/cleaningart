<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\User;
use App\master;
use App\art;
class C_ART extends Controller
{
	//lihat semua art
	public function dataart(Request $request){

	    if ($request->has('cari')){
	        $data_art = \App\art::where('name', 'LIKE', '%'
	        .$request->cari. '%')->paginate(10);
	    }else{
	        $data_art = \App\art::paginate(10);
	    }
	    return view('admin.v_art',['data_art' => $data_art]);
	}

    //buat data art
    public function create(Request $request){
        $this->validate($request,[
            'name' => 'required|min:4',
            'username'=>'required|min:5|unique:users',
            'email'=>'required|email',
            'password'=>'required|min:5',
            'foto' => 'mimes:jpg,png,jpeg',
            'tanggallahir' => 'date|after:1960-12-12|before:2001-12-12|nullable',
            'nohp'=>'required|min:11|max:13|regex:/(0)[0-9]{10}/',
            'kodepos' => 'numeric|min:4|nullable'
        ]);
        $user = \App\user::create($request->all());
        $user->password = bcrypt($user->password);
        $user->remember_token = str_random(60);
        $user->save();
        $request->request->add(['user_id'=> $user->id]);
        $art = \App\art::create($request->all());
         if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $art->foto = $request->file('foto')->getClientOriginalName();
            $art->save();
        }
        	return redirect(url('/dataart'))->with('sukses','data berhasil ditambahkan');
    }

    //edit data art
    public function edit($id){
        $art = \App\art::find($id);
        return view('admin.v_editart', ['art' => $art]);
    }

    //update dataart
    public function update(Request $request, $id){
         $art = \App\art::find($id);
         $art->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $art->foto = $request->file('foto')->getClientOriginalName();
            $art->save($request->all());
        }
        if ( $art )
        return redirect(url('/dataart'))->with('sukses', 'data berhasil diubah');
    }

    //liat profil data art
    public function profilart($id){
        $art = \App\art::find($id);
        return view('admin.v_profileart', ['art' => $art]);
    }

    

}
