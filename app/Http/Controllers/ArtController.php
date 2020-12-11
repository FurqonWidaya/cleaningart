<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use App\User;
use App\master;
use App\art;
use DB;
class ArtController extends Controller
{

  //notfound
  public function error()
  {
    return view('art.404');
  }

  //liat profil art
  public function profilart($id)
  {
    return view('art.v_profil');
  }

  //edit data art
  public function settingart($id){
    $users = \App\User::find($id);
    return view('art.v_edit', ['users' => $users]);
  }

  //update data art bug versi 1
  // public function updateart(Request $request, $id){
  //     $users = \App\user::find($id);
  //     $users->update($request->all());
  //     $art = \App\art::find($id);
  //     $art->update($request->all());
  //     if ($request->hasFile('foto')) {
  //         $request->file('foto')->move('images/', $request->file('foto')->getClientOriginalName());
  //         $art->foto = $request->file('foto')->getClientOriginalName();
  //         $art->save($request->all());}
  //     return redirect(url('/profilku/{id}'))->with('sukses', 'data berhasil diubah');
  // }

  //update data art versi 2 fix bug
  public function updateart(Request $request, $id){
    $users = \App\user::find($id);
    $users->update($request->all());
    if ($request->hasFile('foto')) {
      $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
      DB::table('users as u')
      ->join('art as ar', 'u.id', '=', 'ar.user_id')->where('ar.user_id',$id)
      ->update([
        "name" => $request->name,
        "nohp"=>  $request->nohp,
        "kecamatan"=>  $request->kecamatan,
        "alamat" => $request->alamat,
        "kodepos" => $request->kodepos,
        "foto" => $request->file('foto')->getClientOriginalName(),
      ]);}
      else{
        DB::table('users as u')
        ->join('art as ar', 'u.id', '=', 'ar.user_id')->where('ar.user_id',$id)
        ->update([
          "name" => $request->name,
          "nohp"=>  $request->nohp,
          "kecamatan"=>  $request->kecamatan,
          "alamat" => $request->alamat,
          "kodepos" => $request->kodepos,
        ]);
      }

      return redirect(url('/profilku/{id}'))->with('success', 'data berhasil diubah');
    }

    public function updatedesk(Request $request, $id){
      DB::table('users as u')
      ->join('art as ar', 'u.id', '=', 'ar.user_id')
      ->update([
        "deskripsi" => $request->deskripsi,
      ]);
      return redirect(url('/profilku/{id}'))->with('sukses', 'data berhasil diubah');
    }

    public function editpass($id)
    {
      return view('art.changepassword');
    }

    //update ganti password
    public function updatepass(Request $request)
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
      return redirect(url('/profilku/{id}'))->with('success', 'password telah berganti');
    }

    //lihat about us
    public function about()
    {
      return view('art.aboutus');
    }
  }
