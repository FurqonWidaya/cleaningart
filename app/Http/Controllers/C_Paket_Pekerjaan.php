<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\paket_pekerjaan;
class C_Paket_Pekerjaan extends Controller
{

  //lihat paket
    public function index(Request $request)
    {
      if ($request->has('cari')){
          $data_paket = \App\paket_pekerjaan::where('nama_paket', 'LIKE', '%'
          .$request->cari. '%')->paginate(5);

      }else{
        $data_paket = \App\paket_pekerjaan::paginate(5);}
        return view ('admin.paket_pekerjaan', ['data_paket' => $data_paket]);
    }

    //buat paket
    public function create(Request $request)
    {
      $this->validate($request,[
          'nama_paket' => 'required|min:5|unique:paket_pekerjaan',
          'harga_paket'=>'required|numeric|min:30000',
          'deskripsi_paket' => '|min:20|'
      ]);
      $data_paket = \App\paket_pekerjaan::create($request->all());
      // $paket->nama_paket= $request->nama_paket;
      // $paket->harga_paket=$request->harga_paket;
      // $paket->deskripsi_paket = $request->deskripsi_paket;
       if ($request->hasFile('foto_paket')) {
          $request->file('foto_paket')->move('images', $request->file('foto_paket')->getClientOriginalName());
          $data_paket->foto_paket = $request->file('foto_paket')->getClientOriginalName();
      }
      $data_paket ->save();
      return redirect('/paket_pekerjaan')->with('sukses','data berhasil ditambahkan');
    }



    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        $data_paket = \App\paket_pekerjaan::find($id);
          return view ('admin.detailsPaket', ['data_paket' => $data_paket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $data_paket = \App\paket_pekerjaan::find($id);
      return view ('admin.editpaketpk', ['data_paket' => $data_paket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data_paket = \App\paket_pekerjaan::find($id);
      $data_paket->update($request->all());
     // if ($request->hasFile('foto_paket')) {
     //     $request->file('foto_paket')->move('images', $request->file('foto_paket')->getClientOriginalName());
     //     $data_paket->foto_paket = $request->file('foto_paket')->getClientOriginalName();
     //     $data_paket->save($request->all());
     // }

     return redirect('/paket_pekerjaan')->with('sukses', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
