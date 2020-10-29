@extends('art.layouts.master')
@section('content')
<br><br>
<div class="faq padding ptb-xs-40">
  <div class="container"> <h3>Setting</h3>
  <form action="/myprofil/update/{{auth()->user()->id}}" method="POST" >
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