<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index(Request $request){
        if ($request->has('cari')){
            $data_art = \App\art::where('nama', 'LIKE', '%' .$request->cari. '%')->get();
        }else{
            $data_art = \App\art::all();
        }

        //dd($request->all());
        //$data_art = \App\art::all();
        return view('art.index',['data_art' => $data_art]);
    }
    public function create(Request $request){
        \App\art::create($request->all());
        return redirect('/art')->with('sukses','data berhasil ditambahkan');
    	//return $request->all();
    }
    public function editw($id){
        $art = \App\art::find($id);
        return view('art.editw', ['art' => $art]);
 }
 public function update(Request $request, $id){
    $art = \App\art::find($id);
    $art->update($request->all( ));
    return redirect('/art')->with('sukses','data berhasil diupdate');
}

}