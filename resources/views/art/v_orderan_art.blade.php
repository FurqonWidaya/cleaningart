@extends('art.layouts.master')
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
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tawaran Pekerjaan</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <br>
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="dark-bg">
          <tr>
             <th>Nama master</th>
              <th>Nama Paket</th>
              <th>Total</th>
              <th>Status Penerimaan</th>
          </tr>
        </thead>
              @foreach($data_order as $order)
        <tbody>
          <tr>
            <td>{{$order->nama_master}}</td>
              <td>{{$order->paket}}</td>
              <td>Rp {{$order->harga}}</td>
              @if($order->sp == 3)
              <td> <form action="{{url('/terima/'.$order->id)}}" method="post">
                  {{csrf_field()}}
                  <input type="number" name="sp" value="1" readonly="" hidden="">
                  <input type="text" name="status" value="2" readonly="" hidden="">
                <button class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>Terima&nbsp;</button></form><br><br>
                <form action="{{url('/tolak/'.$order->id)}}" method="post">
                   <input type="number" name="sp" value="2" readonly="" hidden="">
                  <input type="text" name="status" value="2" readonly="" hidden="">
                  {{csrf_field()}}
                  <input type="number" name="sp" value="2" readonly="" hidden="">
                <button class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>Tolak&nbsp;</button></form>
              </td>
              @elseif($order->sp == 1)
              <td> 
                <a class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>Telah diterima&nbsp;</a></<
              </td>
              @else()
               <td> 
               
                <a class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>telah ditolak&nbsp;</button>
              </td>
              @endif
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