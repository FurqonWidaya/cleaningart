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
  //
   public function klikorder($id)
   {
		$art =art::all();
		$bank =m_bank::all();
		$status = status_penerimaan::all();
		$data_paket = \App\paket_pekerjaan::find($id);
		return view ('master.v_order_paket', ['data_paket' => $data_paket], compact('art', 'bank', 'status'));
   }
   public function postorder(Request $request){
   	 $this->validate($request,[         
            'kecamatan'=>'required|min:3',
            'kodepos'=>'required',
            'alamat'=>'required|min:8',
              
        ],
        	[
            'kecamatan.required' => 'masukkan kecamatan anda untuk melanjutkan',
             'kodepos.required' => 'masukkan kodepos anda untuk melanjutkan',
              'alamat.required' => 'masukkan alamat anda untuk melanjutkan',
        ]
        
    );
   	   // $order = m_order_paket::create($request->all());
   	   // return redirect('/checkout');
   	   // return $request;
   	   $order = new m_order_paket;

        $order->id_art = $request->art_id;
        $order->id_master = $request->master_id;
       	$order->id_paket = $request->paket_id;
        $order->id_bank = $request->bank_id;
        $order->id_status_penerimaan =$request->status_id;
        $order->save();
        return redirect(url("/checkout"))->with('success', 'pesanan berhasil dibuat');
   }

   public function checkout()
   {
   	return view('master.v_checkout_paket');
   
   }
   public function myorder(request $request)
   {
     $user = \Auth::user()->id;
     // $data_order = m_order_paket::forUser($user->findOrFail($id));
     // $this->data['order_art'] = $data_order;
     $data_order = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as nomor, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat, us.username as username, oa.id_master as activeuser'))->where('oa.id_master', $user)
    ->get();
    return view('master.v_orderan_master', compact('data_order'));
   
   }



   //untuk admin
   public function lihatorder(request $request)
   {
     if ($request->has('cari')){
          $data_order = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as nomor, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat'))
    ->where('nama_paket', 'LIKE', '%'
          .$request->cari. '%')->get();
    
      }else{
   $data_order = DB::table('order_art as oa')
    ->join('master as ms', 'ms.user_id', '=', 'oa.id_master')
    ->join('users as us', 'us.id', '=', 'ms.user_id')
    ->join('art as ar', 'ar.user_id', '=', 'oa.id_art')
    ->join('paket_pekerjaan as pk', 'pk.id', '=', 'oa.id_paket')
    ->join('bank as b', 'b.id', '=', 'oa.id_bank')
    ->join('status_penerimaan as sp', 'sp.id', '=', 'oa.id_status_penerimaan')
    ->select(DB::raw('oa.id as nomor, ms.name as nama_master, ar.name as nama_art, pk.nama_paket as paket, pk.harga_paket as harga, b.bank as bank, sp.status_penerimaan as status_penerimaan, oa.created_at as tanggal_dibuat, us.username as username'))
    ->get();
    }
    return view('admin.v_order_paket', ['data_order' => $data_order]);
   
   }

  public function lihatriwayat()
     {

      return redirect(url('/notfound'));
     
     }
}
