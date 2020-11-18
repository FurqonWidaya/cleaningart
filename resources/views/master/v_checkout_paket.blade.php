@extends('master.layouts.master')
<!-- Intro Section -->
<section class="inner-intro bg-img light-color overlay-before parallax-background">
  <div class="container">
    <div class="row title">
      <div class="title_row">
        <h1 data-title="Service"><span>Paket pekerjaan</span></h1>
        <div class="page-breadcrumb">
          <a href="{{url('/home')}}">Home</a>/ <span>Paket Pekerjaan</span>
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
             
                <div class="box-title">
                  <h4> Silahkan Transfer ke rekening ini</h4>
                  <h5>90309734343</h5>
       </div>
     
        </div>
       </div>
       </div>
        </div>
       </div>
@endsection