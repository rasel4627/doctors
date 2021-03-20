@extends('frontend.layout')
@section('content')
<div class="breadcrumb-bar">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-md-12 col-12">
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
</nav>
<h2 class="breadcrumb-title">Patient Dashboard</h2>
</div>
</div>
</div>
</div>
<div class="content">
<div class="container-fluid">
@foreach($patientdashboard as $row)
	
@endforeach
<div class="row">
<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
<div class="profile-sidebar">
<div class="widget-profile pro-widget-content">
<div class="profile-info-widget">
<div class="profile-det-info">
<h3>{{ $row->patient_name }}</h3>
<div class="patient-details">
<h5><i class="fas fa-birthday-cake"></i> {{ $row->patient_age }} Years</h5>
<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $row->patient_address }}</h5><br>
<h5 class="mb-0"><i class=""></i>{{ $row->patient_phone }}</h5>
</div>
</div>
</div>
</div>
<div class="dashboard-widget">
<nav class="dashboard-menu">
<ul>
</ul>
</nav>
</div>

</div>
</div>
<!-- / Profile Sidebar -->

<div class="col-md-7 col-lg-8 col-xl-9">
<div class="card">
<div class="card-body pt-0">

<!-- Tab Menu -->
<nav class="user-tabs mb-4">
<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
<li class="nav-item">
<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
</li>
</ul>
</nav>
<div class="tab-content pt-0">
<div id="pat_appointments" class="tab-pane fade show active">
<div class="card card-table mb-0">
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0">
	<thead>
		<tr>
			<th>Appt ID</th>
			<th>Doctor</th>
			<th>Speciality</th>
			<th>Chamber</th>
			<th>Appt Date</th>
			<th>Appt Time</th>
			<th>Amount</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($patientdashboard as $row)
		<tr>
			<td>{{ $row->id}}</td>
			<td>{{ $row->doctor_name}}</td>
			<td>{{ $row->speciality}}</td>
			<td>{{ $row->chamber}}</td>
			<td>{{ date('d F Y', strtotime($row->appointment_date)) }}</td>
			<td>{{ date('g:i A', strtotime($row->appointment_time)) }}</td>
			<td>{{ $row->consulting_fee }}</td>
			<td><span class="badge badge-pill bg-success-light">Confirm</span></td>
		</tr>
	    @endforeach
	</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

</div><br><br><br><br><br><br>
</div>
</div>
</div>

</div>

</div>		
@endsection