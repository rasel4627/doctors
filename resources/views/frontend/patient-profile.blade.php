@extends('frontend.layout')
@section('content')
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-12 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Profile</li>
</ol>
</nav>
<h2 class="breadcrumb-title">Profile</h2>
</div>
</div>
</div>
</div>
<div class="content">
<div class="container-fluid">
<div class="row" style="margin-left: 260px">
<div class="col-md-10 theiaStickySidebar dct-dashbd-lft">
<div class="card widget-profile pat-widget-profile">
<div class="card-body">
<div class="pro-widget-content">
<div class="profile-info-widget">
<div class="profile-det-info">
<h3>Patient Name : {{ $patient->name }}</h3>
<div class="patient-details">
<h5><b>Patient ID :</b> PTP0{{ $patient->id }}</h5>
<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $patient->address }}</h5>
</div>
</div>
</div>
</div>
<div class="patient-info">
<ul><br><br>
<li><span style="font-style: italic;float: left">Phone :</span> {{ $patient->phone }}</li>
<li><span style="font-style: italic;float: left">Age :</span> {{ $patient->age }}</li>
<li><span style="font-style: italic;float: left">Email :</span> {{ $patient->email }}</li>
<li><span style="font-style: italic;float: left">Address :</span> {{ $patient->address }}</li>
</ul>
</div>
</div><br><br><br><br><br>
</div>
</div>
</div>
</div>
</div>		
@endsection