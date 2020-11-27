@extends('admin.layouts.master')
@section('content')
  <ol class="breadcrumb">
    <li><i class="fa fa-home"></i><a href="{{url('/dashboard')}}">&nbsp;Home&nbsp;</a></li>
    <li>&#47;&nbsp;<i class="fa fa-users"></i>&nbsp;Data Transaksi</li>
  </ol>
<div class="row">
</div>
<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6"> 
    <h6 class="m-0 font-weight-bold text-primary">data transaksi</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <div class="row">
    <form  method="get" action="{{url('/datatransaksi')}}" role="search">
    <div class="col-sm-12 col-md-4">
      <div id="dataTable_filter" class="dataTables_filter">
        <label>Search:<input name="cari" type="text" class="form-control form-control-sm" placeholder="cari nomor pembayaran" aria-describedby="basic-addon2" ></label>
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
              <th>nomor pembayaran</th>
              <th>nomor order</th>
              <th>Tanggal Pembayaran</th>
              <th>Status Pembayaran</th>
          </tr>
        </thead>   
              @foreach($transaksi as $pembayaran)               
        <tbody>
          <tr class="text-center">
             <th>{{$i++}}</th>
              <td>{{$pembayaran->kode_pembayaran}}</td>
              <td>{{$pembayaran->order_art->nomor_order}}</td>  
              <td>{{$pembayaran->created_at}}</td>
               <td> 
                <button class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>&nbsp;{{$pembayaran->statuspembayaran->statuspembayaran}}</button>
              </td>
          
          </tr>
          </tbody>
          @endforeach
      </table>

    </div>
  </div>
</div>
@stop