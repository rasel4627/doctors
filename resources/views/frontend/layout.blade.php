<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Doctorsinfo</title>
<link type="image/x-icon" href="{{ asset('public/frontend/assets/img/favicon.png') }}" rel="icon">
<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/fancybox/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
</head>
<body>
@php
	$setting = DB::table('setting')->where('id',1)->first();
@endphp
<div class="main-wrapper">
<header class="header">
<nav class="navbar navbar-expand-lg header-nav">
<div class="navbar-header">
	<a id="mobile_btn" href="javascript:void(0);">
		<span class="bar-icon">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</a>
	<a href="{{ url('/') }}" class="navbar-brand logo">
		<img src="{{ asset($setting->logo)}}" class="img-fluid" alt="Logo">
	</a>
</div>
<div class="main-menu-wrapper">
	<div class="menu-header">
		<a href="index-2.html" class="menu-logo">
			<img src="{{ asset('public/frontend/assets/img/logo.png')}}" class="img-fluid" alt="Logo">
		</a>
		<a id="menu_close" class="menu-close" href="javascript:void(0);">
			<i class="fas fa-times"></i>
		</a>
	</div>
	<ul class="main-nav">
		<li class="active">
			<a href="{{ url('/') }}">Home</a>
		</li>	
		<li class="has-submenu">
			<a href="">Patients <i class="fas fa-chevron-down"></i></a>
			<ul class="submenu">
				<li><a href="{{ url('patient-dashboard') }}">Patient Dashboard</a></li>
				<li><a href="{{ url('patient-proflie') }}">Patient Profile</a></li>
			</ul>
		</li>
		<li>
			<a href="{{ url('/doctors') }}" >Doctors</a>
		</li>
		<li>
			<a href="{{ url('/admin') }}" target="_blank">Admin</a>
		</li>
	</ul>		 
</div>		 
<ul class="nav header-navbar-rht">
	<li class="nav-item contact-item">
		<div class="header-contact-img">
			<i class="far fa-hospital"></i>							
		</div>
		<div class="header-contact-detail">
			<p class="contact-header">Contact</p>
			<p class="contact-info-header">+88{{$setting->company_phone}}</p>
		</div>
	</li>

	 <?php 
          $patient_id = Session::get('patient_id');
      ?>

	<?php  if($patient_id != NULL) { ?>
         <li class="nav-item"><a class="nav-link header-login" href="{{ url('/patient-logout')}}">Log Out</a></li>
    <?php } else{ ?>
          <li class="nav-item"><a class="nav-link header-login" href="{{ url('/login')}}">login / Signup</a></li>
    <?php } ?>
</ul>
</nav>
</header>


  @yield('content')


<footer class="footer">
<div class="footer-top">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 col-md-12">
		
			<!-- Footer Widget -->
			<div class="footer-widget footer-about">
				<div class="footer-logo">
					<img src="{{ asset('public/frontend/assets/img/footer-logo.png')}}" alt="logo">
				</div>
				<div class="footer-about-content">
					<p>We support our patients with respect</p>
					<div class="social-icon">
						<ul>
							<li>
								<a href="{{$setting->company_fb}}" target="_blank"><i class="fab fa-facebook-f"></i> </a>
							</li>
							<li>
								<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
							</li>
							<li>
								<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
							</li>
							<li>
								<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
							</li>
							<li>
								<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Footer Widget -->
			
		</div>
		
		
		
		<div class="col-lg-6 col-md-12">
		
			<!-- Footer Widget -->
			<div class="footer-widget footer-contact">
				<h2 class="footer-title">Contact Us</h2>
				<div class="footer-contact-info">
					<div class="footer-address">
						<span><i class="fas fa-map-marker-alt"></i></span>
						<p> {{$setting->company_address}},<br> {{$setting->company_city}} </p>
					</div>
					<p>
						<i class="fas fa-phone-alt"></i>
						+88{{$setting->company_phone}}
					</p>
					<p class="mb-0">
						<i class="fas fa-envelope"></i>
						{{$setting->company_email}}
					</p>
				</div>
			</div>
		</div>	
	</div>
</div>
</div>
<div class="footer-bottom">
<div class="container-fluid">
	<div class="copyright">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<div class="copyright-text">
					<p class="mb-0"><a href="">Developed By Mursheda</a></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-6">
				<div class="copyright-menu">
					<ul class="policy-menu">
						<li><a href="{{ url('/tc') }}">Terms and Conditions</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</footer>
</div>
<script src="{{ asset('public/frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/popper.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/slick.js')}}"></script>
<script src="{{ asset('public/frontend/assets/js/script.js')}}"></script>
<script src="{{ asset('public/frontend/assets/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
</body>
</html>