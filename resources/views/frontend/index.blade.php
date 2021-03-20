@extends('frontend.layout')
@section('content')

@php
	$doctor = DB::table('doctors')
			->join('categories','doctors.department','categories.id')
            ->select('doctors.*','categories.treatment_name')
			->get();
@endphp

<section class="section section-search">
<div class="container-fluid">
<div class="banner-wrapper">
	<div class="banner-header text-center">
		<h1>Search Doctor, Make an Appointment</h1>
		<p>Discover the best doctors, clinic & hospital for you.</p>
	</div>
     
	<!-- Search -->
	<div class="search-box">
		<form action="{{ url('/search') }}" method="get">
			<div class="form-group search-info">
				<input type="text" class="form-control" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc" name="specialist">
				<span class="form-text">Ex : Dental or Cardiology etc</span>
			</div>
			<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
		</form>
	</div>
</div>
</div>
</section>
<section class="section section-specialities">
<div class="container-fluid">
<div class="section-header text-center">
	<h2>Clinic and Specialities</h2>
	<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>
<div class="row justify-content-center">
	<div class="col-md-9">
		<div class="specialities-slider slider">
			<div class="speicality-item text-center">
				<div class="speicality-img">
					<img src="{{ asset('public/frontend/assets/img/specialities/specialities-01.png')}}" class="img-fluid" alt="Speciality">
					<span><i class="fa fa-circle" aria-hidden="true"></i></span>
				</div>
				<p>Urology</p>
			</div>
			<div class="speicality-item text-center">
				<div class="speicality-img">
					<img src="{{ asset('public/frontend/assets/img/specialities/specialities-02.png')}}" class="img-fluid" alt="Speciality">
					<span><i class="fa fa-circle" aria-hidden="true"></i></span>
				</div>
				<p>Neurology</p>	
			</div>							
			<!-- /Slider Item -->
			
			<!-- Slider Item -->
			<div class="speicality-item text-center">
				<div class="speicality-img">
					<img src="{{ asset('public/frontend/assets/img/specialities/specialities-03.png')}}" class="img-fluid" alt="Speciality">
					<span><i class="fa fa-circle" aria-hidden="true"></i></span>
				</div>	
				<p>Orthopedic</p>	
			</div>							
			<!-- /Slider Item -->
			
			<!-- Slider Item -->
			<div class="speicality-item text-center">
				<div class="speicality-img">
					<img src="{{ asset('public/frontend/assets/img/specialities/specialities-04.png')}}" class="img-fluid" alt="Speciality">
					<span><i class="fa fa-circle" aria-hidden="true"></i></span>
				</div>	
				<p>Cardiologist</p>	
			</div>							
			<!-- /Slider Item -->
			
			<!-- Slider Item -->
			<div class="speicality-item text-center">
				<div class="speicality-img">
					<img src="{{ asset('public/frontend/assets/img/specialities/specialities-05.png')}}" class="img-fluid" alt="Speciality">
					<span><i class="fa fa-circle" aria-hidden="true"></i></span>
				</div>	
				<p>Dentist</p>
			</div>							
			<!-- /Slider Item -->
			
		</div>
		<!-- /Slider -->
		
	</div>
</div>
</div>   
</section>	 
<!-- Clinic and Specialities -->

<!-- Popular Section -->
<section class="section section-doctor">
<div class="container-fluid">
<div class="row">
	<div class="col-lg-4">
		<div class="section-header ">
			<h2>Book Our Doctor</h2>
			<p>Lorem Ipsum is simply dummy text </p>
		</div>
		<div class="about-content">
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
			<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
			<a href="javascript:;">Read More..</a>
		</div>
	</div>
	<div class="col-lg-8">
		<div class="doctor-slider slider">
		
		@foreach($doctor as $row)
			<div class="profile-widget">
				<div class="doc-img">
					<a href="{{ url('/doctor-profile/'.$row->id) }}">
						<img class="img-fluid" alt="User Image" src="{{ asset($row->image)}}" style="height: 160px">
					</a>
					<a href="javascript:void(0)" class="fav-btn">
						<i class="far fa-bookmark"></i>
					</a>
				</div>
				<div class="pro-content">
					<h3 class="title">
						<a href="{{ url('/doctor-profile/'.$row->id) }}">{{ $row->doctor_name }}</a> 
						<i class="fas fa-check-circle verified"></i>
					</h3>
					<p class="speciality">{{ $row->degree }} in {{ $row->treatment_name }}</p>
					<ul class="available-info">
						<li>
							<i class="fas fa-map-marker-alt"></i> {{ $row->chamber }}
						</li>
						<li>
							<i class="far fa-clock"></i> {{ $row->visit_day }}
						</li>
						<li>
							<i class="far fa-money-bill-alt"></i>{{ $row->consulting_fee }} ৳
						</li>
					</ul>
					<div class="row row-sm">
						<div class="col-6">
							<a href="{{ url('/doctor-profile/'.$row->id) }}" class="btn view-btn">View Profile</a>
						</div>
						<div class="col-6">
							<a href="{{ url('/booking/'.$row->id) }}" class="btn book-btn">Book Now</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>
</div>
</div>
</section>
<section class="section section-features">
<div class="container-fluid">
<div class="row">
	<div class="col-md-5 features-img">
		<img src="{{ asset('public/frontend/assets/img/features/feature.png')}}" class="img-fluid" alt="Feature">
	</div>
	<div class="col-md-7">
		<div class="section-header">	
			<h2 class="mt-2">Availabe Features in Our Clinic</h2>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
		</div>	
		<div class="features-slider slider">
			<!-- Slider Item -->
			<div class="feature-item text-center">
				<img src="{{ asset('public/frontend/assets/img/features/feature-01.jpg')}}" class="img-fluid" alt="Feature">
				<p>Patient Ward</p>
			</div>
			<!-- /Slider Item -->
			
			<!-- Slider Item -->
			<div class="feature-item text-center">
				<img src="{{ asset('public/frontend/assets/img/features/feature-02.jpg')}}" class="img-fluid" alt="Feature">
				<p>Test Room</p>
			</div>
			<div class="feature-item text-center">
				<img src="{{ asset('public/frontend/assets/img/features/feature-03.jpg')}}" class="img-fluid" alt="Feature">
				<p>ICU</p>
			</div>
			<div class="feature-item text-center">
				<img src="{{ asset('public/frontend/assets/img/features/feature-04.jpg')}}" class="img-fluid" alt="Feature">
				<p>Laboratory</p>
			</div>
			<div class="feature-item text-center">
				<img src="{{ asset('public/frontend/assets/img/features/feature-05.jpg')}}" class="img-fluid" alt="Feature">
				<p>Operation</p>
			</div>
			<div class="feature-item text-center">
				<img src="{{ asset('public/frontend/assets/img/features/feature-06.jpg')}}" class="img-fluid" alt="Feature">
				<p>Medical</p>
			</div>
		</div>
	</div>
</div>
</div>
</section>
@endsection