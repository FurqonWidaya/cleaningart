@extends('master.layouts.master')
@section('content')
<div class="faq padding ptb-xs-40">
	<br><br>
  <div class="container"> <h3>Profil Saya</h3>
    @if(session('message'))
    <div class="alert alert-success" role="alert">
      {{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
   @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
   <div class="col-xl-12 sm-2 md-2 text-center">
                  <h4 style="text-align: center; color: #000">{{auth()->user()->master->name}}</h4>
                  <div class="img rounded-circle" style="text-align: center;">
                    <img src="{{auth()->user()->master->getPhoto()}}" alt="foto" style="width: 90px;  margin-bottom: 15px;">
                  </div>
                  <h6 style="text-align: center;">{{auth()->user()->role}}</h6>
                  <div style=" margin-bottom: 10px">
                    <a href="/myprofil/setting/{{auth()->user()->id}}" class="btn btn-danger">Edit</a>
                  </div>
                </div>
                <div class="col-xl-12 sm-4 md-4 text-center">
                  <p style="margin-top: 30px; margin-bottom: 1rem;">Email: {{auth()->user()->email}}</p>
                  <p>username: @<span></span>{{auth()->user()->username}}</p>
                  <h6>
                   <span><i class="icon_clock_alt"></i>Akun Dibuat: {{auth()->user()->created_at}}</span>
                   </h6>
                </div>
                <div class="col-xl-12 sm-4 md-4 text-center">
                  <p>No HP: <span></span>{{auth()->user()->master->nohp}}</p>
                  <p>Kecamatan: <span></span>{{auth()->user()->master->kecamatan}}</p>
                   <p>Alamat: <span></span>{{auth()->user()->master->alamat}}</p>
                    <p>Kode Pos: <span></span>{{auth()->user()->master->kodepos}}</p>
                </div>
                
  </div>
</div>
@endsection