<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login CLEANING ART</title>
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon.png')}}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('awal/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('awal/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('awal/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('awal/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{asset('awal/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('awal/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('awal/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('awal/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
  @if(session('sukses'))
<!-- Modal -->
    <div class="alert alert-success" role="alert">
      {{session('sukses')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
  @if(session('success'))
<!-- Modal -->
    <div class="alert alert-success" role="alert">
      {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
  @if(session('error'))
<!-- Modal -->
    <div class="alert alert-danger" role="alert">
      {{session('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  @endif
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
<form action="/postpassword/{{auth()->user()->id}}" method="POST">
          {{csrf_field()}}
          <div class="form-group">
        <label >Password Sekarang</label>
        <input name="current_password" type="password" class="form-control" id="Password" value="{{auth()->user()->Password}}">
        @if($errors->has('current_password'))
            <span class="help-block">{{($errors->first('current_password'))}}</span>
          @endif
      </div>
      <div class="form-group">
        <label >Password Baru</label>
        <input name="new_password" type="password" class="form-control" id="new_password">
      </div>
     <div class="form-group">
          <label >Konfirmasi Password Baru</label>
          <input name="new_password" type="password" class="form-control" id="new_password">
        </div>
      @if($errors->has('new_password'))
            <span class="help-block">{{($errors->first('new_password'))}}</span>
          @endif
     <button type="submit" class="btn btn-primary">simpan</button>
     </div>
          <div class="text-center w-full p-t-115">
            <span class="txt1">
              Belum punya akun?
            </span>

            <a class="txt1 bo1 hov1" href="/register">
              Regitrasi dulu            
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  

  
<!--===============================================================================================-->  
  <script src="{{asset('awal/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('awal/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('awal/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('awal/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('awal/js/main.js')}}"></script>

</body>
</html>