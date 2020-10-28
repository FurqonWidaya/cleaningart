@extends('admin.layouts.master')
@section('content')
 <div class="row">
  <div class="col-sm col-md-12">
           <div class="card shadow">
            <h2 class="text-center" style="margin-top: 15px">PROFIL ADMIN</h2><hr>
               <div class="row col-12" style="margin-top: 5px;">
                <div class="col-xl-3 sm-2 md-2">
                  <h4 style="text-align: center; color: #000">{{auth()->user()->name}}</h4>
                  <div class="img rounded-circle" style="text-align: center;">
                    <img src="/images/default.png" alt="foto" style="width: 90px;  margin-bottom: 15px;">
                  </div>
                  <h6 style="text-align: center;">{{auth()->user()->role}}</h6>
                  <div class="text-center" style=" margin-bottom: 10px">
                    <a href="/edit/{{auth()->user()->id}}" class="btn btn-danger">Edit</a>
                  </div>
                </div>
                <div class="col-xl-7 sm-4 md-4">
                  <p style="margin-top: 30px; margin-bottom: 1rem;" class="text-justify">Email: {{auth()->user()->email}}</p>
                  <p>username: @<span></span>{{auth()->user()->username}}</p>
                  <h6>
                   <span><i class="icon_clock_alt"></i>Akun Dibuat: {{auth()->user()->created_at}}</span>
                   </h6>
                </div>
                </div>
                </div>
              </div>
            </div>
@endsection