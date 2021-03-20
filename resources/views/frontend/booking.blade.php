@extends('frontend.layout')
@section('content')
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-12 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
		<li class="breadcrumb-item active" aria-current="page">Booking</li>
	</ol>
</nav>
<h2 class="breadcrumb-title">Booking</h2>
</div>
</div>
</div>
</div>
<div class="content">
<div class="container">

<div class="row">
<div class="col-12">

<div class="card">
	<div class="card-body">
		<div class="booking-doc-info">
			<a href="{{ url('/doctor-profile/'.$booking->id) }}" class="booking-doc-img">
				<img src="{{ asset($booking->image)}}" alt="User Image">
			</a>
			<div class="booking-info">
				<h4><a href="{{ url('/doctor-profile/'.$booking->id) }}">{{ $booking->doctor_name }}</a></h4>
				<p> {{ $booking->degree }} in {{ $booking->treatment_name }}</p>
				<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{ $booking->chamber }}</p>
			</div>
		</div>
	</div>
</div>

<div class="card booking-schedule schedule-widget">
	<div class="schedule-header">
		<div class="row">
			<div class="col-md-12">
				<div class="day-slot">
					<ul>
						<li style="margin-left: 150px;width: 700px">
							<span>{{ $booking->visit_day }}</span>
							<span class="slot-date">( {{ $booking->visit_time }} )<small class="slot-year"></small></span>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="schedule-cont">
		<div class="row">
	@php
		 Session::put('doctor_name',$booking->doctor_name);
		 Session::put('id',$booking->id);
		 Session::put('treatment_name',$booking->treatment_name);
		 Session::put('chamber',$booking->chamber);
		 Session::put('image',$booking->image);
		 Session::put('consulting_fee',$booking->consulting_fee);
	@endphp
		<form  action="{{ url('/take-appointment') }}" method="post">
		  @csrf
			<div class="col-md-12">
				<div class="time-slot">
					<ul class="clearfix">
						<li style="margin-left: 300px;width: 400px">
							<p>Select Booking Date</p>
							<input type="date" name="date" class="form-control" required="">
						</li>
						<li style="margin-left: 300px;width: 400px">
							<p>Select Booking Time</p>
							<input type="time" name="time" class="form-control" required="">
						</li>
						<li style="margin-left: 300px;width: 400px;margin-top: 20px">
						   <button type="submit" class="btn btn-primary submit-btn">Proceed to Pay</button>
						</li>
					</ul>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>
@endsection