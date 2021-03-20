@extends('layout')
@section('content')
@php 
    $admin = DB::table('admins')->where('admin_id',1)->first();
@endphp

<div class="row user-profile">
  <div class="col-lg-4 side-left">
    <div class="card mb-4">
      <div class="card-body avatar">
        <h2 class="card-title">Admin Profile</h2>
        <img src="http://via.placeholder.com/47x47" alt="">
        <p class="name">{{ $admin->admin_name }}</p>
        <p class="designation">Web Developer</p>
        <a class="email" href="">{{ $admin->admin_email }}</a>
        <a class="number" href="">{{ $admin->admin_phone }}</a>
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-body overview">
        <ul class="achivements">
        </ul>
        <div class="wrapper about-user">
          <h2 class="card-title mt-4 mb-3">About</h2>
          <p>I have experienced more than 2 years in web developing sector.So for, I know what my client wants.I Completed many E-commerce project by using my skill.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 side-right">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
          <h2 class="card-title">Password Change</h2>
        </div>
        <div class="wrapper">
          <br>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
              <form action="{{ url('/password-change/'.$admin->admin_id) }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Current Password <span style="color: red">*</span></label>
                  <input type="password" class="form-control" name="current_password" id="name" placeholder="Current Password" required="">
                </div>

                <div class="form-group">
                  <label for="name">New Password <span style="color: red">*</span></label>
                  <input type="password" class="form-control" name="new_password" id="name" placeholder="New Password" required="">
                </div>

                <div class="form-group">
                  <label for="name">Confirm New Password <span style="color: red">*</span></label>
                  <input type="password" class="form-control" name="confirm_new_password" id="name" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group mt-5">
                  <button type="submit" class="btn btn-success mr-2">Update Password</button>
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