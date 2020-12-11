<?php

namespace App\Http\Controllers;
use App\Art;
use App\User;
use DB;
use Illuminate\Http\Request;

class c_Home extends Controller
{

  //homenya admin
  public function setviewhome (){
    $count_art = DB::table('art')->count();
    $count_mast = DB::table('master')->count();
    $count_paket = DB::table('paket_pekerjaan')->count();
    $count_order = DB::table('order_art')->count();
    return view ('admin.v_home', ['count' => $count_art,'counts' => $count_mast, 'paket' => $count_paket,'order' => $count_order]);
  }

  //homenya master
  public function setviewhomemaster ()
  {
    $data_art = \App\art::inRandomOrder()->take(4)->get();
    // $paket = \App\paket_pekerjaan::paginate(3);
    $paket = \App\paket_pekerjaan::inRandomOrder()->take(3)->get();
    return view('master.v_home_master',['data_art' => $data_art, 'paket' => $paket]);

  }

  //homenya art
  public function setviewhomeart (){
    $paket = \App\paket_pekerjaan::paginate(3);
    return view ('art.v_home_art', [ 'paket' => $paket]);
  }
}
