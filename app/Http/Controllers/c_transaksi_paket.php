<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use APP\pembayaran;
use APP\m_order_paket;
class c_transaksi_paket extends Controller
{
    public function bayarpaket($id)
    {
    	$data_order = DB::table('order_art as oa') 
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->select(DB::raw('pk.nama_paket as nama_paket, pk.harga_paket as harga_paket, oa.nomor_order as nomor_order, oa.created_at as tanggal_dibuat, oa.id_master as activeuser, oa.id as id_order, oa.id_status_penerimaan as sp, DATE_ADD(oa.created_at, INTERVAL 24 HOUR) as due_date'))->where('oa.nomor_order', $id)
     ->first();    
    	return view('master.v_upload_transaksi', compact('data_order'));
    }

public function postbayarpaket(Request $request)
    {
    	$this->validate($request,[         
            'bukti_transfer'=>'required',       
        ],
        	[
            'bukti_transfer.required' => 'masukkan upload bukti transfer pembayaran anda untuk melanjutkan',
        ]
    );
    	$pembayaran = \App\pembayaran::create($request->all());
    	$pembayaran->bukti_transfer = $request->bukti_transfer;
    	$pembayaran->id_status_pembayaran  = $request->id_status_pembayaran;
    	$pembayaran->id_order  = $request->id_order;
    	$pembayaran->day_start = $request->day_start;
        $pembayaran->updated_at = $request->day_start;
    	$pembayaran->day_over = $request->day_over;
    	$pembayaran->save();

    	return redirect('/error')->with('success', 'bukti transaski sedang diproses, mohon tunggu');
    }
}
