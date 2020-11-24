<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master;
use auth;
use App\paket_pekerjaan;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
use App\art;
use App\m_bank;
use App\m_order_paket;
use App\status_penerimaan;

class c_order_paket extends Controller
{


  //untuk master
  //buat order
   public function klikorder($id)
   {
    $master = auth()->user()->masters;
		$art = art::where('status', '=', 1)->get();
		$bank =m_bank::all();
		$status = status_penerimaan::all();
		$data_paket = \App\paket_pekerjaan::find($id);
		return view ('master.v_order_paket', compact('data_paket', 'art', 'bank', 'status', 'master'));
   }

   //simpan order
   public function postorder(Request $request){
   	 $this->validate($request,[         
            'kecamatan'=>'required|min:3',
            'kodepos'=>'required',
            'alamat'=>'required|min:4',
            'waktu_kerja' => 'required|date|date_format:Y-m-d|after:today|before:7 days',         
        ],
        	[
            'kecamatan.required' => 'masukkan kecamatan anda untuk melanjutkan',
             'kodepos.required' => 'masukkan kodepos anda untuk melanjutkan',
              'alamat.required' => 'masukkan alamat anda untuk melanjutkan',
              'waktu_kerja.required' => 'tentukan waktu kerja',
              'waktu_kerja.after' => 'pilihan waktu kerja harus diset setelah hari ini',
              'waktu_kerja.before' => 'pilihan waktu kerja harus diset paling lama 7 hari kedepan'
        ]
    );
     $user =  \Auth::user()->id;
   	   $order = new m_order_paket;
       $pin = mt_rand(1000000000, 9999999999);
        $nomor_order = str_shuffle($pin);
        $order->id_art = $request->art_id;
        $order->id_master = $request->master_id;
       	$order->id_paket = $request->paket_id;
        $order->id_bank = $request->bank_id;
        $order->id_status_penerimaan =$request->status_id;
         $order->waktu_kerja = $request->waktu_kerja;
          $order->nomor_order = $nomor_order;
        $order->save();
        DB::table('master')
   ->where('user_id', $user )
   ->update([ 
        "kecamatan"=>  $request->kecamatan,
        "alamat" => $request->alamat,
        "kodepos" => $request->kodepos, ]);
        return redirect(url("/checkout/".$order->nomor_order))->with('success', 'pesanan berhasil dibuat');
        
   }

   //tagihan order
   public function checkout($id)
   {
     $data_order = DB::table('order_art as oa')->join('bank as bn', 'bn.id', '=', 'oa.id_bank')->select(DB::raw('oa.id as id, bn.no_rekening as no_rekening, bn.nama as nama, bn.bank as bank, oa.nomor_order as nomor_order, oa.created_at as created_at'))->where('oa.nomor_order', $id)->first();
     // dd($data_order);
   	return view('master.v_checkout_paket', compact('data_order'));
   }

   //lihat order
   public function myorder(request $request)
   {
     $user = \Auth::user()->id;

     $data_order = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as id, oa.nomor_order as nomor_order, oa.id_master as master, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat, us.username as username, oa.id_master as activeuser, oa.id_status_penerimaan as sp, DATE_ADD(oa.created_at, INTERVAL 24 HOUR) as due_date'))->where('oa.id_master', $user)->where('sp.status_penerimaan','=',3)->whereNull('oa.deleted_at')->orderBy('oa.created_at', 'desc')
     ->get();    

     $order_acc = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as id, oa.nomor_order as nomor_order, oa.id_master as master, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat, us.username as username, oa.id_master as activeuser, oa.id_status_penerimaan as sp, DATE_ADD(oa.created_at, INTERVAL 24 HOUR) as due_date'))->where('oa.id_master', $user)->where('sp.status_penerimaan','=',1)->whereNull('oa.deleted_at')->orderBy('oa.created_at', 'desc')
     ->get(); 

     $batal_order = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as id, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat, us.username as username, oa.id_master as activeuser, oa.id_status_penerimaan as sp, oa.nomor_order as nomor_order'))->where('oa.id_master', $user)->whereOr('sp.status_penerimaan','=',2)->wherenotNull('oa.deleted_at')
     ->orderBy('oa.created_at', 'desc')->get();
    // dd($request->all());
    //  DB::table('order_art')->select('*')
    // ->where('created_at', '<', 'INTERVAL 1 MINUTE')->where('id_master', $user)->delete();
     // if($data_order) {
     //    if($data_order['due_date'] > date()) {
     //      DB::table('order_art')->where('id_master', $user)->delete()
     //    }
     //    else{
    return view('master.v_orderan_master', compact('data_order','batal_order', 'order_acc'));

   }

//batalkan pesan
     public function batal_order(request $request, $id)
     {
     
      
       // $order = DB::table('order_art')->where('id',$id);
       // $order->delete();
      \App\m_order_paket::where('id',$id)->delete();
    
       return redirect('/myorder')->with('success', 'pesanan telah dibatalkan');
     }


   //untuk admin
   public function lihatorder(request $request)
   {
     if ($request->has('cari')){
          $data_order = DB::table('order_art as oa')
    ->leftjoin('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->leftjoin('users as us', 'us.id', '=', 'ms.user_id')
    ->leftjoin('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->leftjoin('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->leftjoin('bank as b', 'b.id', '=', 'oa.id_bank')
    ->leftjoin('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as nomor, us.username as username,ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat'))->whereNull('oa.deleted_at')
    ->where('nama_paket', 'LIKE', '%'
          .$request->cari. '%')->orderBy('tanggal_dibuat', 'desc')->get();
    
      }else{
    $data_order = DB::table('order_art')
    ->leftjoin('master', 'order_art.id_master', '=', 'master.user_id')
    ->leftjoin('users', 'users.id', '=', 'master.user_id')
    ->leftjoin('art', 'order_art.id_art', '=', 'art.user_id')
    ->leftjoin('paket_pekerjaan', 'order_art.id_paket', '=', 'paket_pekerjaan.id')
    ->leftjoin('bank', 'order_art.id_bank', '=', 'bank.id')
    ->leftjoin('status_penerimaan', 'order_art.id_status_penerimaan', '=', 'status_penerimaan.id')
    ->select(DB::raw('order_art.id as nomor,users.username as username, master.name as nama_master, art.name as nama_art, paket_pekerjaan.nama_paket as paket, paket_pekerjaan.harga_paket as harga, bank.bank as bank, status_penerimaan.status_penerimaan as status_penerimaan, order_art.created_at as tanggal_dibuat'))->whereNull('order_art.deleted_at')->orderBy('tanggal_dibuat', 'desc')
    ->get();
     
    }
    return view('admin.v_order_paket', compact('data_order'));
   
   }

  public function lihatriwayat()
     {

      return redirect(url('/notfound'));
     
     }
     public function myorderhistory()
     {

      return redirect(url('/error'));
     
     }

     

     //art lihat order
     public function pesananku(request $request)
   {
     $user = \Auth::user()->id;
     $data_order = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as id, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat, us.username as username, oa.id_master as activeuser, oa.id_status_penerimaan as sp'))->where('oa.id_art', $user)->whereNull('oa.deleted_at')->orderBy('oa.created_at', 'desc')
    ->get();
    
    return view('art.v_orderan_art', compact('data_order'));
   
   }
   public function terima(request $request, $id)
   {
     DB::table('order_art as oa')->join('art as ar', 'ar.user_id', '=', 'oa.id_art')->where('oa.id', $id)
   ->update([ 
        "id_status_penerimaan" => $request['sp'],
        "status" => $request['status_kerja'],

      ]);
   return redirect()->back();
   }

   public function tolak(request $request, $id)
   {
     DB::table('order_art as oa')->join('art as ar', 'ar.user_id', '=', 'oa.id_art')->where('oa.id', $id)
   ->update([ 
        "id_status_penerimaan" => $request['sp'],
          "status" => $request['status'],
      ]);
   return redirect()->back();
   }
}
