<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use app\pembayaran;
use app\m_order_paket;
use App\master;
use App\user;
use auth;
use Session;
use Illuminate\Support\Facades\Input;
class c_transaksi_paket extends Controller
{

    // mengelola transaksi --- master
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
    	 $transaksi = pembayaran::create($request->all());
      //$transaksi->bukti_transfer = $request->bukti_transfer;
      $transaksi->id_statuspembayaran  = $request->id_statuspembayaran;
      $pin = mt_rand(1100000000111, 9999999999999);
        $kode_pembayaran = str_shuffle($pin);
        $transaksi->kode_pembayaran = $kode_pembayaran;
      $transaksi->id_order  = $request->id_order;
      $transaksi->day_start = $request->day_start;
      $transaksi->day_over = $request->day_over;
      if ($request->hasFile('bukti_transfer')) {
          $request->file('bukti_transfer')->move('images', $request->file('bukti_transfer')->getClientOriginalName());
          $transaksi->bukti_transfer = $request->file('bukti_transfer')->getClientOriginalName();
      }
      $transaksi->save();
      $nomor = 1;
       DB::table('order_art')
   ->update([ 
        "mp"=>  $nomor,
        ]);
      return redirect('/myorder')->with('success', 'bukti transaski sedang diproses, mohon tunggu');
    }


//mengelola transaksi --- admin

    public function verifytrans(request $request)
    {

        if ($request->has('cari')){
         $transaksi = \App\pembayaran::orderBy('created_at', 'DESC')
    ->where('kode_pembayaran', 'LIKE', '%'
          .$request->cari. '%')->where('id_statuspembayaran','=',1)->paginate(5);
      }else{
        $transaksi = \App\pembayaran::orderBy('created_at', 'DESC')->where('id_statuspembayaran','=',1)->paginate(5);
    }
         
       return view('admin.v_verify_transaksi', compact('transaksi'));
    }


    public function lihattrans(request $request)
    {
        if ($request->has('cari')){
         $transaksi = \App\pembayaran::orderBy('created_at', 'DESC')
    ->where('kode_pembayaran', 'LIKE', '%'
          .$request->cari. '%')->where('id_statuspembayaran','=',2)->paginate(5);
      }else{
        $transaksi = \App\pembayaran::orderBy('created_at', 'DESC')->where('id_statuspembayaran','=',2)->paginate(5);
    }
       return view('admin.v_transaksi_paket', compact('transaksi'));
    }
       
    public function konfirmasi(request $request)
    {
         DB::table('pembayaran')
   ->update([ 
        "id_statuspembayaran" => $request['statuspembayaran'],
      ]);
   return redirect('/datatransaksi')->with('success', 'pembayaran berhasil diverifikasi');
    }
    public function selesai(request $request)
    {
        $id=$request->id;
         DB::table('order_art as oa')->join('art as ar', 'ar.user_id','=','id_art')->where('oa.id',$id)
   ->update([ 
        "mp" => $request['mp'],
        "status" => $request['status'],
      ]);
   return redirect('/myorder')->with('success', 'orderan berhasil diselsaikan');
    }
    
}
