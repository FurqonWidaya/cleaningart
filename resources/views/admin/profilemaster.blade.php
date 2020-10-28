@extends('admin.layouts.master')
@section('content')
     <div class="row">
  <div class="col-sm col-md">
           <div class="card shadow">
            <h2 class="text-center" style="margin-top: 15px">PROFIL MASTER</h2><hr>
               <div class="row col-12" style="margin-top: 5px;">
                <div class="col-xl-2 sm-2 md-2">
                  <h4 style="text-align: center; color: #000">{{$master->name}}</h4>
                  <div class="img rounded-circle" style="text-align: center; wid">
                    <img src="{{$master->getPhoto()}}" alt="foto" style="width: 90px; margin-left:15px; margin-bottom: 15px;">
                  </div>
                  <h6 style="text-align: center">Master</h6>
                </div>
                <div class="col-xl-4 sm-4 md-4">
                  <p style="margin-top: 30px; margin-bottom: 1rem;" class="text-justify">Email: {{$master->email}}</p>
                  <p>username: @<span></span>{{$master->username}}</p>
                  <h6>
                   <span><i class="icon_clock_alt"></i>Akun Dibuat: {{$master->created_at}}</span>
                   </h6>
                </div>
                <div class="col-xl-3 sm-6 md-2">
                    <div class="col" style="text-align: center">
                      <i class="fa fa-phone-volume fa-2x" ><hr></i><br>No Hp: {{$master->nohp}}
                    </div>
                </div>
                <div class="col-xl-3 sm-6 md-2">
                    <div class="col" style="text-align: center">
                      <i class="fa fa-location-arrow fa-2x" ><hr></i><br>Alamat:<br>{{$master->alamat}}<br>{{$master->kecamatan}} {{$master->kodepos}}
                    </div>
                </div>
                </div>
              </div>
            </div>
         
      </div>
@endsection