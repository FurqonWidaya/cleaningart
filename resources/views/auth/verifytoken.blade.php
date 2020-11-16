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
<body>
	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="POST" action="{{url('/activationtoken')}}" >{{csrf_field()}}
					<span class="login100-form-title p-b-20">
						Masukkan Token
					</span>
				
					
					<div class="wrap-input100">
						<input class="input100" type="text" name="active_token" id="active_token" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-token"></span>
						</span>
					</div>
					<div class="container-login100-form-btn p-t-5">
						<button type="submit" class="login100-form-btn" >
							Kirim
						</button>
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
	<script type="text/javascript">
		function pass(){
 var pass = document.getElementById('password');
 var show = document.getElementById('show');
 if(pass.type == 'password'){
  pass.type = 'text';
 }else{
  pass.type = 'password';
 }
}
	</script>

</body>
</html>