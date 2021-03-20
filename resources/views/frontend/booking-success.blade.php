@extends('frontend.layout')
@section('content')
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
	<div class="col-md-12 col-12">
		<nav aria-label="breadcrumb" class="page-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Booking</li>
			</ol>
		</nav>
		<h2 class="breadcrumb-title">Booking</h2>
	</div>
</div>
</div>
</div>
<div class="content success-page-cont">
<div class="container-fluid">
<div class="row justify-content-center">
	<div class="col-lg-6">
		<div class="card success-card">
			<div class="card-body">
				<div class="success-cont">
					<i class="fas fa-check"></i>
					<h3>Appointment booked Successfully!</h3>
					<p>Appointment booked with <strong>{{ Session::get('doctor_name') }}</strong><br> on <strong>{{ Session::get('date') }} at {{ Session::get('time') }}</strong></p>
					<a href="{{ url('/') }}" class="btn btn-primary view-inv-btn">Done</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>	
@endsection	
