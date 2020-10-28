@extends('admin.layouts.master')
@section('content')
     <div class="row">
  <div class="col-sm col-md">
           <div class="card shadow">
              <h2 class="text-center" style="margin-top: 15px">PROFIL ART</h2><hr>
               <div class="row col-12" style="margin-top: 5px;">
                <div class="col-xl-2 sm-2 md-2">
                  <h4 style="text-align: center">{{$art->name}}</h4>
                  <div class="img rounded-circle" style="text-align: center">
                    <img src="{{$art->getPhoto()}}" alt="foto" style="width: 90px;  margin-bottom: 15px;">
                  </div>
                  <h6 style="text-align: center">ART</h6>
                  <div class="text-center" style=" margin-bottom: 10px">
                  	<a href="/art/edit/{{$art->id}}" class="btn btn-danger">Edit</a>
                  </div>
                </div>
                <div class="col-xl-4 sm-4 md-4">
                  <p style="margin-top: 30px; margin-bottom: 1rem;" class="text-justify">Deskripsi: {{$art->deskripsi}}</p>
                  <p>@ {{$art->username}}</p>
                  <h6>
                   <span><i class="icon_clock_alt"></i>Dibuat: {{$art->created_at}}</span>
                   </h6>
                </div>
                <div class="col-xl-2 sm-6 md-2">
                    <div class="col" style="text-align: center">
                      <i class="fa fa-phone-volume fa-2x" ><hr></i><br>CP: {{$art->nohp}}
                    </div>
                </div>
                <div class="col-xl-2 sm-6 md-2">
                    <div class="col" style="text-align: center">
                      <i class="fa fa-location-arrow fa-2x" ><hr></i><br>{{$art->alamat}}<br>{{$art->kecamatan}} {{$art->kodepos}}
                    </div>
                </div>
                 <div class="col-xl-2 sm-6 md-2">
                    <div class="col" style="text-align: center">
                      <i class="fa fa-bell fa-2x"><hr></i><br>Status: {{$art->status}}
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
@endsection