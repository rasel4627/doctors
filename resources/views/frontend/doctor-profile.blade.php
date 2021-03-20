@extends('frontend.layout')
@section('content')
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-12 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
</ol>
</nav>
<h2 class="breadcrumb-title">Doctor Profile</h2>
</div>
</div>
</div>
</div>

<div class="content">
<div class="container">

<div class="card">
<div class="card-body">
<div class="doctor-widget">
<div class="doc-info-left">
<div class="doctor-img">
<img src="{{ asset($profile->image)}}" class="img-fluid" alt="User Image">
</div>
<div class="doc-info-cont">
<h4 class="doc-name">{{ $profile->doctor_name }}</h4>
<p class="doc-speciality">{{ $profile->degree }} in {{ $profile->treatment_name }}</p>
<p class="doc-department">{{ $profile->treatment_name }}</p>

<div class="clinic-details">
	<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $profile->chamber }} </p>
	<ul class="clinic-gallery">
		<li>
			<a href="{{ asset('public/frontend/assets/img/features/feature-01.jpg')}}" data-fancybox="gallery">
				<img src="{{ asset('public/frontend/assets/img/features/feature-01.jpg')}}" alt="Feature">
			</a>
		</li>
		<li>
			<a href="{{ asset('public/frontend/assets/img/features/feature-02.jpg')}}" data-fancybox="gallery">
				<img  src="{{ asset('public/frontend/assets/img/features/feature-02.jpg')}}" alt="Feature Image">
			</a>
		</li>
		<li>
			<a href="{{ asset('public/frontend/assets/img/features/feature-03.jpg')}}" data-fancybox="gallery">
				<img src="{{ asset('public/frontend/assets/img/features/feature-03.jpg')}}" alt="Feature">
			</a>
		</li>
		<li>
			<a href="{{ asset('public/frontend/assets/img/features/feature-04.jpg')}}" data-fancybox="gallery">
				<img src="{{ asset('public/frontend/assets/img/features/feature-04.jpg')}}" alt="Feature">
			</a>
		</li>
	</ul>
</div>
<div class="clinic-services">
	<span>{{ $profile->treatment_name }} Specialist</span>
</div>
</div>
</div>
<div class="doc-info-right">
<div class="clini-infos">
<ul>
	<li><i class="far fa-thumbs-up"></i> 99%</li>
	<li><i class="fas fa-map-marker-alt"></i> {{ $profile->city }}</li>
	<li><i class="fas fa-hospital"></i> {{ $profile->contact_number }}</li>
	<li><i class="far fa-money-bill-alt"></i> {{ $profile->consulting_fee }} ৳ (Consulting Fees) </li>
</ul>
</div>
<div class="clinic-booking">
<a class="apt-btn" href="{{ url('/booking/'.$profile->id) }}">Book Appointment</a>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body pt-0">

<nav class="user-tabs mb-4">
<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
<li class="nav-item">
<a class="nav-link active" href="#doc_locations" data-toggle="tab">Locations</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
</li>
</ul>
</nav>
<div class="tab-content pt-0">
<div role="tabpanel" id="doc_locations" class="tab-pane fade show active">

<div class="location-list">
<div class="row">

	<div class="col-md-6">
		<div class="clinic-content">
			<h4 class="clinic-name">{{ $profile->chamber }}</h4>
			<p class="doc-speciality">{{ $profile->degree }}</p>
		</div>
	</div>
	<div class="col-md-4">
		<div class="clinic-timing">
			<div>
				<p class="timings-days">
					<span> {{ $profile->visit_day }}</span>
				</p>
				<p class="timings-times">
					<span>{{ $profile->visit_time }}</span>
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		<div class="consult-price">
			<p class="timings-days">
					<h4>Fees</h4>
				</p>
				<p class="timings-times">
					<span>{{ $profile->consulting_fee }}৳</span>
				</p>
		</div>
	</div>
</div>
</div>
</div>
<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
<div class="row">
<div class="col-md-6 offset-md-3">

	<!-- Business Hours Widget -->
	<div class="widget business-widget">
		<div class="widget-content">
			<div class="listing-hours">
				<div class="listing-day current">
				</div>
				<div class="listing-day">
					<div class="day">{{ $profile->visit_day }}</div>
					<div class="time-items">
						<span class="time">{{ $profile->visit_time }}</span>
					</div>
				</div>
			</div>
		</div>
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