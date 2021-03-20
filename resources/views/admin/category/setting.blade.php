@extends('layout')
@section('content')
@php
    $setting = DB::table('setting')->where('id',1)->first();
@endphp
<div class="col-12 col-lg-6 grid-margin">
  <div class="card">
  <div class="card-body">
      <h2 class="card-title">Settings</h2>
      <form class="forms-sample" action="{{ url('/store-setting/'.$setting->id)}}" method="post" enctype="multipart/form-data">
      	@csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Company Name</label>
              <input type="text" class="form-control p-input" name="company_name" aria-describedby="emailHelp"  value="{{ $setting->company_name }}">
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Website</label>
              <input type="text" class="form-control p-input" name="company_website" aria-describedby="emailHelp" value="{{ $setting->company_website }}">
          </div>

          <div class="form-group">
              <label>Logo</label>
              <div class="row">
                <div class="col-12">
                  <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Upload</label>
                  <input type="file" class="form-control-file" name="logo" id="exampleInputFile2" aria-describedby="fileHelp" onchange="readURL(this);">
                  <input type="hidden" name="old_one" value="{{ $setting->logo }}">
                 <img style="width: 125px;" src="{{ asset($setting->logo) }}" id="one" >
                </div>
              </div>
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control p-input" name="company_email" aria-describedby="emailHelp" value="{{ $setting->company_email }}">
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Phone</label>
              <input type="text" class="form-control p-input" name="company_phone" aria-describedby="emailHelp" value="{{ $setting->company_phone }}">
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Facebook Page</label>
              <input type="text" class="form-control p-input" name="company_fb" aria-describedby="emailHelp" value="{{ $setting->company_fb }}" >
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">Address</label>
              <input type="text" class="form-control p-input" name="company_address" aria-describedby="emailHelp" value="{{ $setting->company_address }}">
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">City</label>
              <input type="text" class="form-control p-input" name="company_city" aria-describedby="emailHelp" value="{{ $setting->company_city }}">
          </div><br>

          <button type="submit" class="btn btn-success">Save</button>
      </form>
  </div>
  </div>
</div>
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#one')
              .attr('src', e.target.result)
              .width(90)
              .height(90);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection