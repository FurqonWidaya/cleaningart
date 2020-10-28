@extends('admin.layouts.master')
@section('content')
    <!-- <div class="col text-right"> -->
<div class="row">
</div>
<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="col-sm-12 col-md-6">
    <h6 class="m-0 font-weight-bold text-primary">Data Master</h6>
    </div>
  </div>
  <div class="card-body" style="font-size: 15px;">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="background-color: #ddd;">
          <tr class="text-center">
              <th>Foto</th>
              <th>Nama</th>
              <th>username</th>
              <th>E-mail</th>
              <th>No HP</th>
              <th>Kecamatan</th>
              <th>Alamat</th>
              <th>Kode Pos</th>
          </tr>
        </thead>
              @foreach($data_master as $master)
        <tbody>
          <tr class="text-center">
              <td><img src="{{$master->getPhoto()}}" style="width: 50px"></td>
              <td><a href="/master/profile/{{$master->id}}">{{$master->name}}</a></td>
            <td><a href="/master/profile/{{$master->id}}">{{$master->username}}</a></td>
              <td>{{$master->email}}</td>
              <td>{{$master->nohp}}</td>
              <td>{{$master->kecamatan}}</td>
              <td>{{$master->alamat}}</td>
              <td>{{$master->kodepos}}</td>
          </tr>
          </tbody>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection