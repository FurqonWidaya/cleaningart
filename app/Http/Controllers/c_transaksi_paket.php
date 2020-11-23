<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class c_transaksi_paket extends Controller
{
    public function bayarpaket($id)
    {
    	$data_order = DB::table('order_art as oa') 
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->select(DB::raw('pk.nama_paket as nama_paket, pk.harga_paket as harga_paket, oa.nomor_order as nomor_order, oa.created_at as tanggal_dibuat, oa.id_master as activeuser, oa.id_status_penerimaan as sp, DATE_ADD(oa.created_at, INTERVAL 24 HOUR) as due_date'))->where('oa.nomor_order', $id)
     ->first();    
    	return view('master.v_upload_transaksi', compact('data_order'));
    }
}
