@extends('art.layouts.master')
@section('content')
<br><br>
<div class="faq padding ptb-xs-40">
  <div class="container"> <h3>Setting</h3>
  <form action="/profilku/update/{{auth()->user()->id}}" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
        <label >Foto</label>
        <input name="foto" type="file" class="form-control" id="foto" value="{{auth()->user()->art->foto}}">
      </div>
      <div class="form-group">
        <label >Nama</label>
        <input name="name" type="text" class="form-control" id="name" value="{{auth()->user()->art->name}}">
         @if($errors->has('name'))
            <span class="help-block">{{($errors->first('name'))}}</span>
          @endif
      </div>
     <div class="form-group">
          <label >Email</label>
          <input name="email" type="email" class="form-control" id="email" value="{{$users->email}}">
           @if($errors->has('email'))
            <span class="help-block">{{($errors->first('email'))}}</span>
          @endif
        </div>
        <div class="form-group">
          <label >username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{auth()->user()->username}}">
           @if($errors->has('username'))
            <span class="help-block">{{($errors->first('username'))}}</span>
          @endif
        </div>
          <div class="form-group">
          <label >No Handphone</label>
          <input type="text" class="form-control" id="nohp" name="nohp" value="{{auth()->user()->art->nohp}}"></div>
          <div class="form-group">
          <label >Kecamatan</label>
          <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="{{auth()->user()->art->kecamatan}}"></div>
          <div class="form-group">
          <label >Kode Pos</label>
          <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{auth()->user()->art->kodepos}}"></div>
          <div class="form-group">
          <label >alamat</label>
          <textarea class="form-control" id="alamat" name="alamat" >{{auth()->user()->art->alamat}}</textarea></div>
           <div class="additional-info">
          <label><a style="color: #3DABD8;" href="/profilku/changepassword/{{auth()->user()->id}}">Ganti Password</a></Label>
        </div>
          <button type="button" class="btn btn-secondary"><a href="/profilku/{{$users->id}}/" >Batal</a></button>
     <button type="submit" class="btn btn-primary">simpan</button>
     </div>
      </form>
  </div>
   
</div>
@endsection