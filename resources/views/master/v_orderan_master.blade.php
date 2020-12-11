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
<!-- Table -->
@if(session('success'))
<!-- Modal -->
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
              <a class="nav-link active" id="Penerimaan-tab" data-toggle="tab" href="#Penerimaan" role="tab" aria-controls="Penerimaan" aria-selected="true">Menunggu Penerimaan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="Pembayaran-tab" data-toggle="tab" href="#Pembayaran" role="tab" aria-controls="Pembayaran" aria-selected="true">Menunggu Pembayaran</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="menunggu-tab" data-toggle="tab" href="#menunggu" role="tab" aria-controls="menunggu" aria-selected="true">Verifikasi Pembayaran</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="diterima-tab" data-toggle="tab" href="#diterima" role="tab" aria-controls="diterima" aria-selected="true">Pembayaran Diterima</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="done-tab" data-toggle="tab" href="#done" role="tab" aria-controls="done" aria-selected="true">Orderan Selesai</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="dibatalkan-tab" data-toggle="tab" href="#dibatalkan" role="tab" aria-controls="dibatalkan" aria-selected="true">Orderan Dibatalkan</a>
            </li>
          </ul>

          <!-- Tab panes -->

          <div class="tab-content">
            @if (isset($data_order) && count($data_order) > 0)
            <div class="tab-pane active" id="Penerimaan" role="tabpanel" aria-labelledby="Penerimaan-tab">
              <br>
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="dark-bg">
                  <tr>
                    <th>Nama Paket</th>
                    <th>Total</th>
                    <th>Nama Art</th>
                    <th>Status Penerimaan</th>
                    <th>Dibuat</th>
                    <th>Tindakan</th>
                  </tr>
                </thead>
                @foreach($data_order as $order)
                <tbody>
                  <tr>
                    <td>{{$order->paket}}</td>
                    <td>Rp {{$order->total}}</td>
                    <td>{{$order->nama_art}}</td>
                    <!--              @if($order->sp == 1)
                    <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>{{$order->status_penerimaan}}</p></td>

                    @elseif($order->sp == 2)
                    <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>{{$order->status_penerimaan}}</p></td>

                    @else() -->
                    <td><p class='btn btn-warning btn-sm'><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{$order->status_penerimaan}}</p></td>
                    <!-- @endif -->

                    <td>{{\Carbon\Carbon::parse($order->tanggal_dibuat)->format('d-m-Y H:i')}}</td>
                    <td><!-- <a href="{{url('/checkout/'.$order->nomor_order)}}" class='btn btn-primary btn-sm'><i class="fa fa-edit fa-fw" aria-hidden="true"></i>Bayar Paket</a><br><br> -->

                      <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#m-batal"><i class="fa fa-close fa-fw" aria-hidden="true" ></i>Batalkan Order</button>
                      <!-- modal -->
                      <div class="modal fade" id="m-batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <div class="tab-pane active" id="Penerimaan" role="tabpanel" aria-labelledby="Penerimaan-tab">belum ada data</div>
              @endif

              @if (isset($order_acc) && count($order_acc) > 0)
              <!-- pembuka tab menunggu-->
              <div class="tab-pane" id="Pembayaran" role="tabpanel" aria-labelledby="Pembayaran-tab"> <br>
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead class="dark-bg">
                    <tr>
                      <th>Nama Paket</th>
                      <th>Total</th>
                      <th>Nama Art</th>
                      <th>Status Penerimaan</th>
                      <th>bayar sampai</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  @foreach($order_acc as $order)
                  <tbody>
                    <tr>
                      <td>{{$order->paket}}</td>
                      <td>Rp {{$order->harga}}</td>
                      <td>{{$order->nama_art}}</td>
                      <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>di{{$order->status_penerimaan}}</p></td>

                      <td>{{\Carbon\Carbon::parse($order->due_date)->format('d-m-Y H:i')}}</td>
                      <td><a href="{{url('/checkout/'.$order->nomor_order)}}" class='btn btn-primary btn-sm'><i class="fa fa-edit fa-fw" aria-hidden="true"></i>Bayar Paket</a><br><br>

                        <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#batal"><i class="fa fa-close fa-fw" aria-hidden="true" ></i>Batalkan Paket</button>
                        <!-- modal -->
                        <div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                <a class="btn btn-primary" href="{{url('/batal_order/'.$order->id)}}">Ya</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end modal --> </td>
                      </tr>
                    </tbody>
                    @endforeach
                  </table></div>
                  <!-- penutup tab-->
                  @else()
                  <!-- pembuka tab menunggu-->
                  <div class="tab-pane" id="Pembayaran" role="tabpanel" aria-labelledby="Pembayaran-tab">belum ada data</div>
                  <!-- penutup tab-->
                  @endif

                  <!-- menunggu verif -->
                  @if (isset($order_ver) && count($order_ver) > 0)
                  <!-- pembuka tab menunggu-->
                  <div class="tab-pane" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">
                    <br>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead class="dark-bg">
                        <tr>
                          <th>Nama Paket</th>
                          <th>Total</th>
                          <th>Nama Art</th>
                          <th>Status Penerimaan</th>
                          <th>bayar pada</th>
                          <th>Status pembayaran</th>
                        </tr>
                      </thead>
                      @foreach($order_ver as $ver_order)
                      <tbody>
                        <tr>
                          <td>{{$ver_order->paket}}</td>
                          <td>Rp {{$ver_order->harga}}</td>
                          <td>{{$ver_order->nama_art}}</td>

                          @if($ver_order->sp == 1)
                          <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>di{{$ver_order->status_penerimaan}}</p></td>

                          @elseif($ver_order->sp == 2)
                          <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>{{$ver_order->status_penerimaan}}</p></td>

                          @else()
                          <td><p class='btn btn-warning btn-sm'><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{$ver_order->status_penerimaan}}</p></td>
                          @endif

                          <td>{{ \Carbon\Carbon::parse($ver_order->buat)->format('d-m-Y H:i')}}</td>
                          <td><p class='btn btn-primary btn-sm'><i class="fa fa-spinner fa-fw" aria-hidden="true">&nbsp;</i>{{$ver_order->spp}}</p></td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  <!-- penutup tab-->
                  @else()
                  <!-- pembuka tab menunggu-->
                  <div class="tab-pane" id="menunggu" role="tabpanel" aria-labelledby="menunggu-tab">belum ada data</div>
                  <!-- penutup tab-->
                  @endif


                  @if (isset($trans_acc) && count($trans_acc) > 0)
                  <!-- pembuka tab-->
                  <div class="tab-pane" id="diterima" role="tabpanel" aria-labelledby="diterima-tab">
                    <br>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead class="dark-bg">
                        <tr>
                          <th>Nama Paket</th>
                          <th>Total</th>
                          <th>Nama Art</th>
                          <th>Status Penerimaan</th>
                          <th>bayar pada</th>
                          <th>Status Pembayaran</th>
                          <th>Status Pekerjaan</th>
                        </tr>
                      </thead>
                      @foreach($trans_acc as $trans)
                      <tbody>
                        <tr>
                          <td>{{$trans->paket}}</td>
                          <td>Rp {{$trans->harga}}</td>
                          <td>{{$trans->nama_art}}</td>

                          @if($trans->sp == 1)
                          <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>di{{$trans->status_penerimaan}}</p></td>

                          @elseif($trans->sp == 2)
                          <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>{{$trans->status_penerimaan}}</p></td>

                          @else()
                          <td><p class='btn btn-warning btn-sm'><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{$trans->status_penerimaan}}</p></td>
                          @endif

                          <td>{{ \Carbon\Carbon::parse($trans->buat)->format('d-m-Y H:i')}}</td>
                          <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true">&nbsp;</i>{{$trans->spp}}</p></td>
                          <td>

                            <button class="btn btn-warning"data-toggle="modal" data-target="#selesai">Konfirmasi Selesai</button>
                            <!-- openmodal -->
                            <div class="modal fade" id="selesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog  modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Peringatan !!</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">“Apakah anda yakin ingin menyelesaikan status pekerjaan art”</div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                    <form method="post" action="{{url('/selesai/'.$trans->id)}}">
                                      {{csrf_field()}}
                                      <input name="mp" hidden="" readonly="" value="3">
                                      <input name="status" hidden="" readonly="" value="1">
                                      <input name="id" value="{{$trans->id}}" hidden="" readonly="">
                                      <button class="btn btn-primary" type="submit">Ya</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- end modal -->

                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  <!-- penutup tab-->
                  @else()
                  <!-- pembuka tab-->
                  <div class="tab-pane" id="diterima" role="tabpanel" aria-labelledby="diterima-tab">belum ada data</div>
                  <!-- penutup tab-->
                  @endif


                  @if (isset($done_order) && count($done_order) > 0)
                  <!-- pembuka tab-->
                  <div class="tab-pane" id="done" role="tabpanel" aria-labelledby="done-tab">
                    <br>
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead class="dark-bg">
                        <tr>
                          <th>Nama Paket</th>
                          <th>Total</th>
                          <th>Nama Art</th>
                          <th>Status Penerimaan</th>
                          <th>bayar pada</th>
                          <th>Status Pembayaran</th>
                          <th>Tindakan</th>
                        </tr>
                      </thead>
                      @foreach($done_order as $done)
                      <tbody>
                        <tr>
                          <td>{{$done->paket}}</td>
                          <td>Rp {{$done->harga}}</td>
                          <td>{{$done->nama_art}}</td>

                          @if($done->sp == 1)
                          <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true"></i>di{{$done->status_penerimaan}}</p></td>

                          @elseif($done->sp == 2)
                          <td><p class='btn btn-danger btn-sm'><i class="fa fa-close fa-fw" aria-hidden="true"></i>{{$done->status_penerimaan}}</p></td>

                          @else()
                          <td><p class='btn btn-warning btn-sm'><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i> {{$done->status_penerimaan}}</p></td>
                          @endif

                          <td>{{ \Carbon\Carbon::parse($done->buat)->format('d-m-Y H:i')}}</td>
                          <td><p class='btn btn-success btn-sm'><i class="fa fa-check fa-fw" aria-hidden="true">&nbsp;</i>{{$done->spp}}</p></td>
                          <td>
                           <!--  <p class="btn btn-success btn-sm" aria-hidden='true'>Selesai</p> -->
                               <button class="btn btn-warning"data-toggle="modal" data-target="#review">Review ART</button>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  <!-- penutup tab-->
                  @else()
                  <!-- pembuka tab-->
                  <div class="tab-pane" id="done" role="tabpanel" aria-labelledby="done-tab">belum ada data</div>
                  <!-- penutup tab-->
                  @endif


                  @if (isset($batal_order) && count($batal_order) > 0)
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
                          <th>Status Order</th>
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

                          <td>{{ \Carbon\Carbon::parse($batalorder->tanggal_dibuat)->format('d-m-Y H:i')}}</td>
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
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      @endsection
