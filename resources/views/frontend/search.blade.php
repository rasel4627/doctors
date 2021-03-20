@extends('frontend.layout')
@section('content')

@php
	$department = DB::table('categories')->get();
	$city = DB::table('city')->get();
	$alldoctor = DB::table('doctors')
			   ->join('categories','doctors.department','categories.id')
			   ->join('city','doctors.location','city.id')
			   ->select('doctors.*','categories.treatment_name','city.city')
			   ->get();
@endphp
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-8 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Search</li>
</ol>
</nav>
<!-- <h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2> -->
<h2 class="breadcrumb-title">All Doctors</h2>
</div>
</div>
</div>
</div>
<!-- /Breadcrumb -->

<!-- Page Content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

<!-- Search Filter -->
<div class="card search-filter">
<div class="card-header">
<h4 class="card-title mb-0">Search Filter</h4>
</div>
<div class="card-body">
<form action="{{ url('/search') }}" method="get">
	<div class="filter-widget">
	<h4>Select Specialist</h4>
	<div class="form-group">
	   <select class="form-control p-input" name="specialist">
	    <option>Select Specialist</option>
	        @foreach($department as $row){?>
	           <option value="{{$row->id}}">{{$row->treatment_name}}</option>
	         @endforeach
	   </select>
	</div>
	</div>
<div class="btn-search">
<button type="submit" class="btn btn-block">Search</button>
</div>
</form>	
</div>
</div>
<!-- /Search Filter -->

</div>

<div class="col-md-12 col-lg-8 col-xl-9">

<!-- Doctor Widget -->
@foreach($alldoctor as $row)
<div class="card">
<div class="card-body">
<div class="doctor-widget">
<div class="doc-info-left">
	<div class="doctor-img">
		<a href="{{ url('/doctor-profile/'.$row->id) }}">
			<img src="{{ asset($row->image)}}" class="img-fluid" alt="User Image">
		</a>
	</div>
	<div class="doc-info-cont">
		<h4 class="doc-name"><a href="{{ url('/doctor-profile/'.$row->id) }}">{{ $row->doctor_name }}</a></h4>
		<p class="doc-speciality">{{ $row->degree }} in {{ $row->treatment_name }}</p>
		
		<div class="clinic-details">
			<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ $row->chamber }}</p>
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
			<span>{{ $row->treatment_name }} Specialist</span>
		</div>
	</div>
</div>
<div class="doc-info-right">
	<div class="clini-infos">
		<ul>
			<li><i class="far fa-thumbs-up"></i> 100%</li>
			<li><i class="fas fa-map-marker-alt"></i>{{ $row->city }}</li>
			<li><i class="far fa-money-bill-alt"></i>{{ $row->consulting_fee }} ৳ (Consulting Fees)</li>
		</ul>
	</div>
	<div class="clinic-booking">
		<a class="view-pro-btn" href="{{ url('/doctor-profile/'.$row->id) }}">View Profile</a>
		<a class="apt-btn" href="{{ url('/booking/'.$row->id) }}">Book Appointment</a>
	</div>
</div>
</div>
</div>
</div>
@endforeach

<!-- /Doctor Widget -->

<div class="load-more text-center">
<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
</div>	
</div>
</div>

</div>

</div>		


@endsection