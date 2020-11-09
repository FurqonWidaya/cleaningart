<?php

namespace App\Http\Controllers;
use App\Art;
use App\User;
use Illuminate\Http\Request;

class c_Home extends Controller
{
  public function home (){

    $data_art = \App\art::paginate(4);
    $paket = \App\paket_pekerjaan::paginate(3);
    return view('master.homed',['data_art' => $data_art, 'paket' => $paket]);

  }

  //paketpekerjaan
  public function details (){

    $paket = \App\paket_pekerjaan::paginate(6);
    return view('master.datapekerjaan',['paket' => $paket]);

  }
}
