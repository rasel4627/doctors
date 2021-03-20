@extends('layout')
@section('content')

@php
   $department = DB::table('categories')->get();
   $city = DB::table('city')->get();
@endphp
<div class="col-12 col-lg-6 grid-margin">
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Add Doctor</h2>

        <form class="forms-sample" action="{{ url('/store-doctor')}}" method="post" enctype="multipart/form-data">
        	@csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Doctor Name</label>
                <input type="text" class="form-control p-input" name="doctor_name" aria-describedby="emailHelp" placeholder="Name" required="">
            </div>
            <div class="form-group">
              <label>Upload Image</label>
              <div class="row">
                <div class="col-12">
                  <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Image</label>
                  <input type="file" class="form-control-file" name="image" id="exampleInputFile2" aria-describedby="fileHelp" onchange="readURL(this);">
                  <img src="" id="one" >
                </div>
              </div>
          </div>
          <div class="form-group">
                <label for="exampleInputPassword1">Department</label>
                <select class="form-control p-input" name="department">
                    <option>Select Department</option>
                        @foreach($department as $row){?>
                           <option value="{{$row->id}}">{{$row->treatment_name}}</option>
                         @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Degree</label>
                <input type="text" class="form-control p-input" name="degree" placeholder="Enter Degree" required="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Visit Time</label>
                <input type="text" class="form-control p-input" name="visit_time" placeholder="Enter Visit Time" required="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Visit Day</label>
                <input type="text" class="form-control p-input" name="visit_day" placeholder="Enter Visit Day" required="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Consulting Fee</label>
                <input type="text" class="form-control p-input" name="consulting_fee" placeholder="Fees" required="">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contact Number</label>
                <input type="text" class="form-control p-input" name="contact_number" placeholder="Enter Phone" required="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Chamber</label>
                <input type="text" class="form-control p-input" name="chamber" placeholder="Enter Chamber" required="">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <select class="form-control p-input" name="city">
                    <option>Select City</option>
                        @foreach($city as $row){?>
                           <option value="{{$row->id}}">{{$row->city}}</option>
                         @endforeach
                </select>
            </div>

           <br>
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
              .width(100)
              .height(90);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection