@extends('layout')
@section('content')

@php
   $department = DB::table('categories')->get();
   $city = DB::table('city')->get();
@endphp

<div class="col-12 col-lg-7 grid-margin">
<div class="card">
    <div class="card-body">
        <h2 class="card-title">Update Doctor</h2>

        <form class="forms-sample" action="{{ url('/update-doctor/'.$edit->id)}}" method="post" enctype="multipart/form-data">
        	@csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Doctor Name</label>
                <input type="text" class="form-control p-input" name="doctor_name" aria-describedby="emailHelp" value="{{ $edit->doctor_name }}">
            </div>

            <div class="form-group">
              <label>Image</label>
              <div class="row">
                <div class="col-12">
                  <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Image</label>
                  <input type="file" class="form-control-file" name="image" id="exampleInputFile2" aria-describedby="fileHelp" onchange="readURL(this);">
                  <input type="hidden" name="old_one" value="{{ $edit->image }}">
				  <img style="width: 125px;" src="{{ asset($edit->image) }}" id="one" >
                </div>
              </div>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Department</label>
                <select class="form-control p-input" name="department">
                    <option>Select Department</option>
                        @foreach($department as $row){?>
                           <option value="{{$row->id}}" <?php if($row->id == $edit->department){
                          echo "selected";
                      } ?> >{{$row->treatment_name}}</option>
                         @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Degree</label>
                <input type="text" class="form-control p-input" name="degree" value="{{ $edit->degree }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Visit Time</label>
                <input type="text" class="form-control p-input" name="visit_time" value="{{ $edit->visit_time }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Visit Day</label>
                <input type="text" class="form-control p-input" name="visit_day" value="{{ $edit->visit_day }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Consulting Fee</label>
                <input type="text" class="form-control p-input" name="consulting_fee" value="{{ $edit->consulting_fee }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contact Number</label>
                <input type="text" class="form-control p-input" name="contact_number" value="{{ $edit->contact_number }}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Chamber</label>
                <input type="text" class="form-control p-input" name="chamber" value="{{ $edit->chamber }}">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <select class="form-control p-input" name="location">
                    <option>Select City</option>
                        @foreach($city as $row){?>
                           <option value="{{$row->id}}" <?php if($row->id == $edit->location){
                          echo "selected";
                      } ?> >{{$row->city}}</option>
                         @endforeach
                </select>
            </div>

           <br>
            <button type="submit" class="btn btn-success">Update</button>
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