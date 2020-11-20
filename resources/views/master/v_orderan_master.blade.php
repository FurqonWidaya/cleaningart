@extends('master.layouts.master')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/tab/templatemo-style.css')}}">
<!-- Intro Section -->
<section class="inner-intro bg-img light-color overlay-before parallax-background">
  <div class="container">
    <div class="row title">
      <div class="title_row">
        <h1 data-title="Service"><span>Orderan Saya</span></h1>
        <div class="page-breadcrumb">
          <a href="{{url('/home')}}">Home</a>/ <span>Orderan Saya</span>
        </div>

      </div>

    </div>
  </div>
</section>
@section('content')
@if(session('success'))
        <div class="alert alert-success" role="alert">
         {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
       @endif
<div id="mission-section" class="ptb ptb-xs-180">
      <div class="container">
        <div class="row">
          <div class="col-md-45 col-lg-12 border text-center">
            <div class="about-block clearfix">
             
                <!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Belum Bayar</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Menunggu Persetujuan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Order Diterima</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="dark-bg">
          <tr>
              <th>Nama Paket</th>
              <th>Total</th>
              <th>Nama Art</th>
              <th>Status Penerimaan</th>
              <th>dibuat pada</th>
              <th>Tindakan</th>
          </tr>
        </thead>
              @foreach($data_order as $order)
        <tbody>
          <tr>
              <td>{{$order->paket}}</td>
              <td>Rp {{$order->harga}}</td>
              <td>{{$order->nama_art}}</td>

              @if($order->sp == 1)
              <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>{{$order->status_penerimaan}}</p></td>

              @elseif($order->sp == 2)
              <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>{{$order->status_penerimaan}}</p></td>

              @else()
              <td><p class='btn btn-warning btn-sm'><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{$order->status_penerimaan}}</p></td>
              @endif

              <td>{{$order->tanggal_dibuat}}</td>
              <td><a href="{{url('/checkout/'.$order->id)}}" class='btn btn-primary btn-sm'><i class="fa fa-edit fa-fw" aria-hidden="true"></i>Bayar Paket</a><br><br>
                <form action="{{url('/batal_order/'.$order->id)}}" method="post">
                  {{csrf_field()}}
                <button class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>Batalkan Paket</button></form>
              </td>
          </tr>
          </tbody>
          @endforeach
      </table>

  </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">belum ada data</div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">belum ada data</div>
</div>
        </div>
       </div>
       </div>
        </div>
       </div>
      <script type="text/javascript">
      $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
      })
      </script>

@endsection