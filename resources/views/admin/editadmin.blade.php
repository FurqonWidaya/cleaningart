@extends('admin.layouts.master')
@section('content')
@if(session('sukses'))
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
    <h6 class="m-0 font-weight-bold text-primary">EDIT Data ADMIN</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
      <div class="table-responsive">
<form action="/admin/{{$users->id}}/update" method="POST" >
        	{{csrf_field()}}
      <div class="form-group">
        <label >Nama</label>
        <input name="name" type="text" class="form-control" id="name" value="{{$users->name}}">
      </div>
     <div class="form-group">
          <label >Email</label>
          <input name="email" type="email" class="form-control" id="email" value="{{$users->email}}">
        </div>
        <div class="form-group">
          <label >username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{$users->username}}">
        </div>
        <div class="form-group">
          <label >password</label>
          <input type="password" class="form-control" id="password" name="password" value="{{$users->password}}" readonly></div>
     <button type="submit" class="btn btn-primary">update</button>
     </div>
      </form>
      </div>
      </div>
      
@endsection

