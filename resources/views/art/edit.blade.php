@extends('art.layouts.master')
@section('content')
<br><br>
<div class="faq padding ptb-xs-40">
  <div class="container"> <h3>Setting</h3>
  <form action="/profilku/update/{{auth()->user()->id}}" method="POST" >
          {{csrf_field()}}
      <!-- <div class="form-group">
        <label >Nama</label>
        <input name="name" type="text" class="form-control" id="name" value="{{$users->name}}">
         @if($errors->has('name'))
            <span class="help-block">{{($errors->first('name'))}}</span>
          @endif
      </div> -->
     <div class="form-group">
          <label >Email</label>
          <input name="email" type="email" class="form-control" id="email" value="{{$users->email}}">
           <!-- @if($errors->has('email'))
            <span class="help-block">{{($errors->first('email'))}}</span>
          @endif -->
        </div>
        <div class="form-group">
          <label >username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{$users->username}}">
           <!-- @if($errors->has('username'))
            <span class="help-block">{{($errors->first('username'))}}</span>
          @endif -->
        </div>
        <div class="form-group">
          <label >password</label>
          <input type="password" class="form-control" id="password" name="password" value="{{$users->password}}" readonly></div>
          <button type="button" class="btn btn-secondary"><a href="/profilku/{{$users->id}}/" >Batal</a></button>
     <button type="submit" class="btn btn-primary">simpan</button>
     </div>
      </form>
  </div>
   
</div>
@endsection