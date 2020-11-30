@extends('admin.layouts.master')
@section('content')
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{url('/dashboard')}}">&nbsp;Home&nbsp;</a></li>
    <li>&#47;&nbsp;<i class="fa fa-users"></i>&nbsp;Data Order Paket</li>
  </ol>
<div class="row">
</div>
<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6"> 
    <h6 class="m-0 font-weight-bold text-primary">Data Order Paket</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <div class="row">
    <form  method="get" action="{{url('data_order')}}" role="search">
    <div class="col-sm-12 col-md-4">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Search:<input name="cari" type="text" class="form-control form-control-sm" placeholder="cari nama paket" aria-describedby="basic-addon2" ></label>
        <button class="btn btn-outline-info" type="submit" style="height: 2rem" >
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
    </form>
  </div>
          <?php $i = 1 ?>
          <thead style="background-color: #ddd;">
          <tr class="text-center">
             <th>Nomor</th>
             <th>Nomor Order</th>
              <th>Nama Master</th>
              <th>Paket</th>
              <th>Total harga</th>
              <th>Nama Art</th>
              <th>Status Penerimaan</th>
              <th>Tanggal Dibuat</th>
              <th>Status Order</th>
          </tr>
        </thead>
             
              @foreach($data_order as $order)               
        <tbody>
          <tr class="text-center">
             <th>{{$i++}}</th>
             <th>{{$order->nomor_order}}</th>
              <td>{{$order->nama_master}}<span style="font-weight: bold;">&nbsp;({{$order->username}})</span></td>
              <td>{{$order->paket}}</td>
              <td>Rp {{$order->total}}</td>
              <td>{{$order->nama_art}}</td>
              <td>{{$order->status_penerimaan}}</td>
              <td>{{\Carbon\Carbon::parse($order->tanggal_dibuat)->format('d-m-Y H:i')}}</td>
              @if($order->mp == 1)
              <td><p class="btn btn-warning">Belum Bayar</p></td>
              @elseif($order->mp == 2)
              <td><p class="btn btn-succes">Bayar</p></td>
              @else
              <td><p class="btn btn-primary">Selesai</p></td>
              @endif
          </tr>
          </tbody>
          @endforeach
      </table>

    </div>
  </div>
</div>
@stop