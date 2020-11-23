@extends('master.layouts.master')
<!-- Intro Section -->
<style type="text/css">
  .copy{
  background-color: #ddd;
  border: none;
  color: black;
  padding: 16px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
  }
  .copy:hover {
  background-color: #3e8e41;
  color: white;}
  .dp-field{
  display: flex;
    align-items: center;
    justify-content: space-between;
    height: auto;
    overflow: hidden;
    position: relative;
    background-color: #fff;
    font-size: 1rem;
    padding: 1rem .85714rem;
    box-sizing: border-box;
}
.dp-field-label {
    flex: 1;
    color: #757575;}
    .dp-field-value {
    flex: 1;
    text-align: right;
    word-wrap: normal;
    word-break: normal;}
</style>
<section class="inner-intro bg-img light-color overlay-before parallax-background">
  <div class="container">
    <div class="row title">
      <div class="title_row">
        <h1 data-title="Service"><span>Transaksi Order</span></h1>
        <div class="page-breadcrumb">
          <a href="{{url('/home')}}">Home</a>/ <span>Transaksi Order</span>
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
        <h3 class="text-center">RINCIAN ORDER PAKET</h3>
        <div class="row">
          <div class="col-lg-12">
            <div class="about-block clearfix">        
                <div class="box-title " style="background-color: #57d87f">
                  <p style="margin: 0px"><i class="fa fa-file fa-fw"></i>&nbsp;Belum bayar</p>
                    <p>Mohon melakukan pembayaran sebelum <span>{{\Carbon\Carbon::parse($data_order->due_date)->format('d-m-Y h:i')}}</span>.&nbsp;Bila tidak, order ini akan dibatalkan secara otomatis</p>
                </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-lg-12 border">
            <div class="about-block clearfix">        
                <div class="box-title ">
                <div class="dp-field"><span class="dp-field-label">Nama Paket</span><span class="dp-field-value"style="font-weight: bold;">{{$data_order->nama_paket}}</span>
                </div>
                <div class="dp-field"><span class="dp-field-label">Harga Paket</span><span class="dp-field-value"style="font-weight: bold;">Rp&nbsp;{{$data_order->harga_paket}}</span>
                </div>
                <hr>
              <div class="dp-field"><span class="dp-field-label">Total Tagihan</span><span class="dp-field-value"style="font-weight: bold;">Rp&nbsp;{{$data_order->harga_paket}}</span>
                </div>
              </div>
          </div>
      </div></div><br>
      <div class="row">
          <div class="col-md-45 col-lg-12 border text-center">
            <div class="about-block clearfix">
              <form>
                <div class="box-title ">
                  <h4 class="pb-50">Silahkan Upload Bukti Pembayaran</h4>
                  <input name="id_status_pembayran" value="1" readonly="" hidden="">
                  <span class="input-group pb-50" style="left: 40%;">
                  <input class="border" type="file" name="bukti_transfer">
                  </span>
                </div>
         <button class="btn btn-primary center">Bayar Order</button>
         </form>
       </div>
       </div>
       <p>nomor order: {{$data_order->nomor_order}}</p>
     </div>
        </div>
       </div>
     </div>
<script type="text/javascript">
function copy(that){
var inp =document.createElement('input');
document.body.appendChild(inp)
inp.value =that.textContent
inp.select();
document.execCommand('copy',false);
inp.remove();
 alert("Nomor Rekening telah disalin dalam clipboard!");
}
       </script>
@endsection