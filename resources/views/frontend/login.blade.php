@extends('frontend.layout')
@section('content')
			
<div class="content">
<div class="container-fluid">
<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="account-content">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-7 col-lg-6 login-left">
					<img src="{{ asset('public/frontend/assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">	
				</div>
				<div class="col-md-12 col-lg-6 login-right">
					<div class="login-header">
						<h3>Patient Login</h3>
					</div>
					<form action="{{ url('/patient-login') }}" method="post">
						@csrf
						<div class="form-group form-focus">
							<input type="email" class="form-control floating" name="email" required="">
							<label class="focus-label">Email</label>
						</div>
						<div class="form-group form-focus">
							<input type="password" class="form-control floating" name="password">
							<label class="focus-label">Password</label>
						</div>
						<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
						<div class="login-or">
							<span class="or-line"></span>
							<span class="span-or">or</span>
						</div>
						<div class="text-center dont-have">Don’t have an account? <a href="{{ url('/register')}}">Register</a></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>	
@endsection