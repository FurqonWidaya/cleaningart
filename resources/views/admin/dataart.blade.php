@extends('admin.layouts.master')
@section('content')
@if(session('sukses'))
<!-- Modal -->
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
   
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Form Daftar ART</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
         </div>
    <div class="modal-body">
    <form action="/dataart/create" method="POST" enctype="multipart/form-data">
        	{{csrf_field()}}
          <input type="text" name="role" value="art" hidden>
        <div class="form-group">
          <label >Foto</label>
          <input name="foto" type="file" class="form-control" id="foto" value="{{old('foto')}}">
        </div>
        <div class="form-group ">
          <label >Nama</label>
          <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">
           @if($errors->has('name'))
            <span class="help-block">{{($errors->first('name'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Email</label>
          <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}">
          @if($errors->has('email'))
            <span class="help-block">{{($errors->first('email'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >No Hp</label>
          <input name="nohp" type="text" class="form-control" id="nohp" value="{{old('nohp')}}">
          @if($errors->has('nohp'))
            <span class="help-block">{{($errors->first('nohp'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="{{old('tanggallahir')}}">
        </div>
        <div class="form-group">
          <label >Kecamatan</label>
          <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{old('kecamatan')}}">
        </div>
        <div class="form-group">
          <label >Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}">
        </div>
        <div class="form-group">
          <label >kode Pos</label>
          <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{old('kodepos')}}">
        </div> 
        <div class="form-group">
          <label >status</label>
        <select class="form-control" id="status" name="status" value="{{old('status')}}">
        <option value="Available" >Availabe</option>
        <option value="Hired" >Hired</option>
        </select>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2" value="{{old('deskripsi')}}">Deskripsi</label>
          <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi" ></textarea>
        </div>
        <div class="form-group">
          <label >username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}">
          @if($errors->has('username'))
            <span class="help-block">{{($errors->first('username'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >password</label>
          <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
          @if($errors->has('password'))
            <span class="help-block">{{($errors->first('password'))}}</span>
          @endif
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Daftarkan</button>
            </div>
      </form>
    </div>
         </div>
      </div>
    </div>

    <!-- <div class="col text-right"> -->
<div class="row">
  <div class="col-sm-12 col-md-6">
  <button type="button" class="btn btn-danger btn-rounded btn-outline
   hidden-xs hidden-sm waves-effect waves-light" data-toggle="modal" data-target="#exampleModal">
   <i class="fa fa-plus-square fa-fw" aria-hidden="true"></i>Tambah ART</button>
   </div>
</div>
<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
    <h6 class="m-0 font-weight-bold text-primary">Data ART</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="background-color: #ddd;">
          <tr class="text-center">
              <th>Foto</th>
              <th>Username</th>
              <th>Nama</th>
              <th>No HP</th>
              <th>Tanggal Lahir</th>
              <th>Kecamatan</th>
              <th>Alamat</th>
              <th>Kode Pos</th>
              <th>Status</th>
              <th style="width: 50%">Deskripsi</th>
              <th>aksi</th>
          </tr>
        </thead>
              @foreach($data_art as $art)
        <tbody>
          <tr class="text-center">
              <td><img src="{{$art->getPhoto()}}" style="width: 50px"></td>
              <td><a href="/art/profile/{{$art->id}}">{{$art->username}}</a></td>
              <td><a href="/art/profile/{{$art->id}}">{{$art->name}}</a></td>
              <td>{{$art->nohp}}</td>
              <td>{{$art->tanggallahir}}</td>
              <td>{{$art->kecamatan}}</td>
              <td>{{$art->alamat}}</td>
              <td>{{$art->kodepos}}</td>
              <td>{{$art->status}}</td>
              <td style="width: 50%">{{$art->deskripsi}}</td>
              <td><a href="/art/edit/{{$art->id}}" class='btn btn-warning btn-sm'><i class="fa fa-edit fa-fw" aria-hidden="true"></i>Edit</a></td>
          </tr>
          </tbody>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection

