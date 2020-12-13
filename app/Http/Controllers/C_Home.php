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
  public function setviewhomemaster (Request $request)
  {
    $id = $request->user_id;
   // $review = \App\m_review::inRandomOrder()->take(3)->get();
    $crev = \App\m_review::all(); 
     $review = DB::table('review as rw')
    ->join('order_art as oa', 'oa.id', '=', 'rw.order_id')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')->where('oa.id_art', $id)
   ->get();
    $data_art = \App\art::paginate(4);
     $count = DB::table('review  as rw')->join('order_art as oa', 'oa.id', '=', 'rw.order_id')
     ->select(DB::raw('AVG(rating) as nilai, oa.id_art'))
                     ->groupBy('oa.id_art', $id)
                     ->first();

    // $paket = \App\paket_pekerjaan::paginate(3);
    $paket = \App\paket_pekerjaan::inRandomOrder()->take(3)->get();
    return view('master.v_home_master',['data_art' => $data_art, 'paket' => $paket, 'count' => $count, 'review' => $review, 'crev'=>$crev]);

  }

  //homenya art
  public function setviewhomeart (){
    $paket = \App\paket_pekerjaan::paginate(3);
    return view ('art.v_home_art', [ 'paket' => $paket]);
  }
}
