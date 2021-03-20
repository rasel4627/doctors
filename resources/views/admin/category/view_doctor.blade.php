@extends('layout')
@section('content')
<div class="row user-profile">
<div class="col-lg-12 side-left" style="width: 500px">
  <div class="card mb-4">
    <div class="card-body avatar">
      <h2 class="card-title">Info</h2>
      <img src="{{ asset($viewdoctors->image) }}" height="80" width="80">
      <p class="name">{{ $viewdoctors->doctor_name }}</p>
      <p class="designation">{{ $viewdoctors->degree }}</p>
      <h3 class="designation">{{ $viewdoctors->contact_number }}</h3>
    </div>
  </div>
  <div class="card mb-6">
    <div class="card-body overview">
      <div class="wrapper about-user">
        <h2 class="card-title mt-12 mb-3">About</h2>
        <p>Information</p>
      </div>
      <div class="info-links">
        <a class="website">
          <i class="icon-globe icon">Full Name : </i>
          <span style="font-family: vernada;font-size: 17px" >{{ $viewdoctors->doctor_name }}</span>
        </a>
        <a class="website">
          <i class="icon-globe icon">Department : </i>
          <span style="font-family: vernada;font-size: 17px" >{{ $viewdoctors->treatment_name }}</span>
        </a>
        <a class="website">
          <i class="icon-globe icon">Degree : </i>
          <span style="font-family: vernada;font-size: 17px" >{{ $viewdoctors->degree }}</span>
        </a>
        <a class="website">
          <i class="icon-globe icon">Visit Day : </i>
          <span style="font-family: vernada;font-size: 17px" >{{ $viewdoctors->visit_day }}</span>
        </a>
        <a class="website">
          <i class="icon-globe icon">Visit Time : </i>
          <span style="font-family: vernada;font-size: 17px" >{{ $viewdoctors->visit_time }}</span>
        </a>
        <a class="website">
          <i class="icon-globe icon">Consulting Fees : </i>
          <span style="font-family: vernada;font-size: 17px" >{{ $viewdoctors->consulting_fee }}</span>
        </a>
        
        <a class="website">
          <i class="icon-globe icon">Chamber : </i>
          <span style="font-family: vernada;font-size: 17px" ><b>{{ $viewdoctors->chamber }}</b></span>
        </a>
      </div>
    </div>
  </div>
</div>
</div>
@endsection