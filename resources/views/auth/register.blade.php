<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register CLEANING ART</title>
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('icon.png')}}">
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
				<form action="/postregister" method="POST">
					<h3>BUAT AKUN</h3>
					{{csrf_field()}}
					<div class="form-holder">
						<span class="lnr lnr-users"></span>
						<input type="text" class="form-control" placeholder="Nama" name="name" required>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-inbox"></span>
						<input type="text" class="form-control" placeholder="Email" name="email" data-validate = "Valid email is required: ex@abc.xyz" id="email" required>
                          
					</div>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control" placeholder="Username" name="username" id="email" required>
                          
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
					</div>
					<button name="submit">
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