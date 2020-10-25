<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v10 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="{{asset('awal/register/fonts/linearicons/style.css')}}">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('awal/register/css/style.css')}}">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<img src="{{asset('awal/register/images/image-1.png')}}" alt="" class="image-1">
				<form action="">
					<h3>New Account?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-phone-handset"></span>
						<input type="text" class="form-control" placeholder="Phone Number">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control" placeholder="Mail">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Confirm Password">
					</div>
					<button>
						<span>Register</span>
					</button>
				</form>
				<hr>
				<h3 class="text-center"><a href="/login">Login</a></h3>
				<img src="{{asset('awal/register/images/image-2.png')}}" alt="" class="image-2">
			</div>
			
		</div>
		
		<script src="{{asset('awal/register/js/jquery-3.3.1.min.js')}}"></script>
		<script src="{{asset('awal/register/js/main.js')}}"></script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>