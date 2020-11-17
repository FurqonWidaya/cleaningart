<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master;
use App\paket_pekerjaan;
use Illuminate\Support\Facades\Input;
use DB;
use App\art;
use App\pajak;
class c_order_paket extends Controller
{
   public function klikorder($id)
   {
   		// $art = data_paket::with('art')->get();
   		$art =art::all();
   		$bank =pajak::all();
   		  $data_paket = \App\paket_pekerjaan::find($id);
          return view ('master.v_order_paket', ['data_paket' => $data_paket], compact('art', 'bank'));
   }
}
