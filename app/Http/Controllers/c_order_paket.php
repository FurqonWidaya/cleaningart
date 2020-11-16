<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use master;
use App\paket_pekerjaan;
use Illuminate\Support\Facades\Input;
use DB;
class c_order_paket extends Controller
{
   public function klikorder($id)
   {
   		  $data_paket = \App\paket_pekerjaan::find($id);
          return view ('master.v_order_paket', ['data_paket' => $data_paket]);
   }
}
