<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{asset('admin-asset/plugins/fontawesome-free/css/all.min.css')}}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{asset('admin-asset/css/adminlte.css')}}">
		<link rel="stylesheet" href="{{asset('css/custom.css')}}">
		<style>
			.margin{
				position: relative;
				 bottom: 38px;
				 left: 250%;	
				 background-color: green
			}
			.margin:hover{
				background-color: yellowgreen;
			}
		</style>
	</head>
	<body class="hold-transition login-page">
				@if(Session::has('admin'))
		<div class="alert alert-danger">	
				{{Session::get('admin')}}
			</div>
				@endif
		<div class="login-box">
			<!-- /.login-logo -->
			
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
					<a href="#" class="h3">Registeration Panel</a>
			  	</div>
			  	<div class="card-body">
					<p class="login-box-msg">Register to start your session</p>
					<form action="{{route('admin.registerauth')}}" method="post">
						@csrf
				  		<div class="input-group mb-3">
							<input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Name"  name="name">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-user"></span>
					  			</div>
							</div>
							<span class="invalid-feedback">
								@error('name')
								  {{$message}}
								@enderror
							</span>
				  		</div>
                        <div class="input-group mb-3">
							<input type="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
								<span class="invalid-feedback">
								@error('email')
								  {{$message}}
								@enderror
							</span>
				  		</div>
                        <div class="input-group mb-3">
							<input type="password" value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
								<span class="invalid-feedback">
								@error('password')
								  {{$message}}
								@enderror
							</span>
				  		</div>
                        
				  		<div class="input-group mb-3">
							<input type="password" value="{{old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password" name="password_confirmation">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
								<span class="invalid-feedback">
								@error('password_confirmation')
								  {{$message}}
								@enderror
							</span>
				  		</div>
				  		<div class="row">
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">Register</button>
							</div>
							
							
							<!-- /.col -->
				  		</div>
					</form>
					<div class="col-4">
    <a href="{{ route('admin.login') }}" class="btn btn-primary btn-block margin">Login</a>
</div>
		  			<p class="mb-1 mt-3">
				  		<a href="forgot-password.html">I forgot my password</a>
					</p>					
			  	</div>
			  	<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{asset('admin-asset/plugins/jquery/jquery.min.js')}}"></script>
		<!-- Bootstrap 4 -->
		<script src="{{asset('admin-asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<!-- AdminLTE App -->
		<script src="{{asset('admin-asset/js/adminlte.min.js')}}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{asset('admin-asset/js/demo.js')}}"></script>
	</body>
</html>