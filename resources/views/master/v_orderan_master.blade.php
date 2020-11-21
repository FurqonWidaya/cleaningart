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
    <a class="nav-link active" id="belumbayar-tab" data-toggle="tab" href="#belumbayar" role="tab" aria-controls="belumbayar" aria-selected="true">Belum Bayar</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="menunggu-tab" data-toggle="tab" href="#menunggu" role="tab" aria-controls="menunggu" aria-selected="false">Menunggu Persetujuan</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="diterima-tab" data-toggle="tab" href="#diterima" role="tab" aria-controls="diterima" aria-selected="false">Order Diterima</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="dibatalkan-tab" data-toggle="tab" href="#dibatalkan" role="tab" aria-controls="dibatalkan" aria-selected="false">Orderan Dibatalkan</a>
  </li>
</ul>

<!-- Tab panes -->
 
<div class="tab-content">
  @if (isset($data_order) && count($data_order) > 0)
  <div class="tab-pane active" id="belumbayar" role="tabpanel" aria-labelledby="belumbayar-tab">
    <br>
      <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead class="dark-bg">
          <tr>
              <th>Nama Paket</th>
              <th>Total</th>
              <th>Nama Art</th>
              <th>bayar sampai</th>
              <th>Tindakan</th>
          </tr>
        </thead>
              @foreach($data_order as $order)
        <tbody>
          <tr>
              <td>{{$order->paket}}</td>
              <td>Rp {{$order->harga}}</td>
              <td>{{$order->nama_art}}</td>
              <td>{{$order->due_date}}</td>
              <td><a href="{{url('/checkout/'.$order->id)}}" class='btn btn-primary btn-sm'><i class="fa fa-edit fa-fw" aria-hidden="true"></i>Bayar Paket</a><br><br>
               
                <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#alertModal"><i class="fa fa-close fa-fw" aria-hidden="true" ></i>Batalkan Paket</button>
                       <!-- modal -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Peringatan !!</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">“Apakah anda yakin untuk membatalkan order yang telah diajukan? Jika anda menekan Ya, maka order yang telah anda lakukan akan dibatalkan dan tidak dapat diproses.”</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="{{url('/batal_order/'.$order->id)}}">Ya</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end modal --> </td>
          </tr>
          </tbody>
          @endforeach
      </table>
  </div>
  <!-- penutup tab belum diterima-->
  @else()
  <div class="tab-pane active" id="belumbayar" role="tabpanel" aria-labelledby="belumbayar-tab">belum ada data</div>
  @endif

  @if (isset($data_order) && count($data_order) > 0)
  <!-- pembuka tab menunggu-->
  <div class="tab-pane" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">belum ada data</div>
  <!-- penutup tab-->
  @else()
   <!-- pembuka tab menunggu-->
  <div class="tab-pane" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">belum ada data</div>
  <!-- penutup tab-->
  @endif

  @if (isset($data_order) && count($data_order) > 0)
  <!-- pembuka tab-->
  <div class="tab-pane" id="diterima" role="tabpanel" aria-labelledby="diterima-tab">belum ada data</div>
  <!-- penutup tab-->
  @else()
  <!-- pembuka tab-->
  <div class="tab-pane" id="diterima" role="tabpanel" aria-labelledby="diterima-tab">belum ada data</div>
  <!-- penutup tab-->
  @endif

@if (isset($data_order) && count($data_order) > 0)
<!-- pembuka tab batal -->
<div class="tab-pane" id="dibatalkan" role="tabpanel" aria-labelledby="dibatalkan-tab">
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
              @foreach($batal_order as $batalorder)
        <tbody>
          <tr>
              <td>{{$batalorder->paket}}</td>
              <td>Rp {{$batalorder->harga}}</td>
              <td>{{$batalorder->nama_art}}</td>

              @if($batalorder->sp == 1)
              <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>{{$batalorder->status_penerimaan}}</p></td>

              @elseif($batalorder->sp == 2)
              <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>{{$batalorder->status_penerimaan}}</p></td>

              @else()
              <td><p class='btn btn-warning btn-sm'><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{$batalorder->status_penerimaan}}</p></td>
              @endif

              <td>{{$batalorder->tanggal_dibuat}}</td>
              <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>Dibatalkan</p>
              </td>
          </tr>
          </tbody>
          @endforeach
      </table>
  </div>
<!-- penutup tab batal-->
@else()
  <!-- pembuka tab-->
  <div class="tab-pane" id="dibatalkan" role="tabpanel" aria-labelledby="dibatalkan-tab">belum ada data</div>
  <!-- penutup tab-->
  @endif
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