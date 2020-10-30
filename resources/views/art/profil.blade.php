@extends('art.layouts.master')
@section('content')
@if(session('error'))
<!-- Modal -->
    <div class="alert alert-warning" role="alert">
      {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
<div class="faq padding ptb-xs-40">
	<br><br>
  <div class="container"> <h3>Profil Saya</h3>
   <div class="col-xl-12 sm-2 md-2 text-center">
                  <h4 style="text-align: center; color: #000">{{auth()->user()->name}}</h4>
                  <div class="img rounded-circle" style="text-align: center;">
                    <img src="/images/default.png" alt="foto" style="width: 90px;  margin-bottom: 15px;">
                  </div>
                  <h6 style="text-align: center;">{{auth()->user()->role}}</h6>
                  <div style=" margin-bottom: 10px">
                    <a href="/profilku/setting/{{auth()->user()->id}}" class="btn btn-danger">Edit</a>
                  </div>
                </div>
                <div class="col-xl-12 sm-4 md-4 text-center">
                  <p style="margin-top: 30px; margin-bottom: 1rem;">Email: {{auth()->user()->email}}</p>
                  <p>username: @<span></span>{{auth()->user()->username}}</p>
                  <h6>
                   <span><i class="icon_clock_alt"></i>Akun Dibuat: {{auth()->user()->created_at}}</span>
                   </h6>
                </div>
                
  </div>
</div>
@endsection