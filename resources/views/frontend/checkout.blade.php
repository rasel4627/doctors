@extends('frontend.layout')
@section('content')
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-12 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
	<li class="breadcrumb-item active" aria-current="page">Checkout</li>
</ol>
</nav>
<h2 class="breadcrumb-title">Checkout</h2>
</div>
</div>
</div>
</div>
<div class="content">
<div class="container">
<div class="row">
<div class="col-md-7 col-lg-8">
<div class="card">
<div class="card-body">

<?php 
   $patient_id = Session::get('patient_id');
   $patient = DB::table('patient')->where('id',$patient_id)->first();
?>
	<?php  if($patient_id != NULL) { ?>
	  <form action="{{ url('store-appointment') }}" method="post">
		@csrf
		<div class="info-widget">
			<h4 class="card-title">Patient Information</h4>
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Name</label>
						<input class="form-control" type="text" name="patient_name" value="{{ $patient->name }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Age</label>
						<input class="form-control" type="number" name="patient_age" value="{{ $patient->age }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Email</label>
						<input class="form-control" type="email" name="patient_email" value="{{ $patient->email }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Phone</label>
						<input class="form-control" type="text" name="patient_phone" value="{{ $patient->phone }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Address</label>
						<input class="form-control" type="text" name="patient_address" value="{{ $patient->address }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Dr.</label>
						<input style="font-weight: bold" class="form-control" type="text" value="{{ Session::get('doctor_name') }}" name="doctor_name" >
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Speciality</label>
						<input class="form-control" type="text" value="{{ Session::get('treatment_name') }}" name="speciality" >
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Appointment Date</label>
						<input class="form-control" type="text" value="{{ date('d F Y', strtotime(Session::get('date'))) }}" name="appointment_date">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Appointment Time</label>
						<input class="form-control" type="text" value="{{ date('g:i A', strtotime(Session::get('time'))) }}" name="appointment_time">
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<label>Consulting Fees</label>
						<input class="form-control" type="text" value="{{ Session::get('consulting_fee') }} ৳" name="consulting_fee">
						<br>
					</div>
				</div>
				
				<div class="col-md-6 col-sm-12">
					<div class="form-group card-label">
						<h3 style="color: gray">Payment Method</h3>
               			 <select class="form-control p-input" name="payment_method" required="">
                   			 <option>Select Payment Method</option>
		                           <option value="1">Pay After Consulting</option>
               			 </select>
					</div>
				</div>
			</div><br>
			<div class="submit-section mt-4">
				<button type="submit" class="btn btn-primary submit-btn">Confirm Appointment</button>
			</div>
		</div>
	</form>		
	
	<?php } else{ ?>
	 	<div class="col-md-12 col-lg-6 login-right">
			<div class="login-header">
			<h3>Patient Register</h3>
		</div>
		<form action="{{ url('patient-registration-checkout') }}" method="post">
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
	<?php } ?>


</div>
</div>
</div>
<div class="col-md-5 col-lg-4 theiaStickySidebar">
<div class="card booking-card">
<div class="card-header">
	<h4 class="card-title">Booking Summary</h4>
</div>
<div class="card-body">
	<div class="booking-doc-info">
		<a class="booking-doc-img">
			<img src="{{ asset(Session::get('image'))}}" alt="User Image">
		</a>
		<div class="booking-info">
			<h4><a>{{ Session::get('doctor_name') }}</a></h4>
			<div class="clinic-details">
				<p class="doc-location"> {{ Session::get('treatment_name') }} Specialist</p>
				<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ Session::get('chamber') }}</p>
			</div>
		</div>
	</div>
	<div class="appointment-summary">
		<div class="appointment-item-wrap">
			<ul class="booking-date">
				<li>Date <span>{{ date('d F Y', strtotime(Session::get('date'))) }}</span></li>
				<li>Time <span>{{ date('g:i A', strtotime(Session::get('time'))) }}</span></li>
			</ul>
			<ul class="booking-fee">
				<li>Consulting Fee <span>{{ Session::get('consulting_fee') }} ৳</span></li>
			</ul>
			<div class="booking-total">
				<ul class="booking-total-list">
					<li>
						<span>Total</span>
						<span class="total-cost">{{ Session::get('consulting_fee') }} ৳</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>		
@endsection