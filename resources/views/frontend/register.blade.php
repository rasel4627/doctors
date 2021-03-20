@extends('frontend.layout')
@section('content')
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-8 offset-md-2">
<div class="account-content">
<div class="row align-items-center justify-content-center">
	<div class="col-md-7 col-lg-6 login-left">
		<img src="{{ asset('public/frontend/assets/img/login-banner.png')}}" class="img-fluid" alt="Doccure Register">	
	</div>
	<div class="col-md-12 col-lg-6 login-right">
		<div class="login-header">
			<h3>Patient Register</a></h3>
		</div>
		
		<!-- Register Form -->
		<form action="{{ url('patient-registration') }}" method="post">
			@csrf
			<div class="form-group form-focus">
				<input type="text" class="form-control floating" name="name" required="">
				<label class="focus-label">Name</label>
			</div>
			<div class="form-group form-focus">
				<input type="text" class="form-control floating" name="age" required="">
				<label class="focus-label">Age</label>
			</div>
			<div class="form-group form-focus">
				<input type="email" class="form-control floating" name="email" required="">
				<label class="focus-label">Email</label>
			</div>
			<div class="form-group form-focus">
				<input type="text" class="form-control floating" name="phone" required="">
				<label class="focus-label">Phone</label>
			</div>
			<div class="form-group form-focus">
				<input type="text" class="form-control floating" name="address" required="">
				<label class="focus-label">Address</label>
			</div>
			<div class="form-group form-focus">
				<input type="password" class="form-control floating" name="password">
				<label class="focus-label">Create Password</label>
			</div>
			<div class="text-right">
				<a class="forgot-link" href="{{ url('/login') }}">Already have an account?</a>
			</div>
			<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
		</form>
	</div>
</div>
</div>	
</div>
</div>
</div>
</div>				
@endsection