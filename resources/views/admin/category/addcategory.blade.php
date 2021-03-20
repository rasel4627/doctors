@extends('layout')
@section('content')
<div class="col-12 col-lg-6 grid-margin">
  <div class="card">
  <div class="card-body">
      <h2 class="card-title">Add Treatment Category</h2>
      <form class="forms-sample" action="{{ url('/store-category')}}" method="post">
      	@csrf
          <div class="form-group">
              <label for="exampleInputEmail1">Type Of Treatment</label>
              <input type="text" class="form-control p-input" name="treatment_name" aria-describedby="emailHelp" placeholder="Enter Treatment Type" required="">
          </div>
          <button type="submit" class="btn btn-success btn-block">Save</button>
      </form>
  </div>
  </div>
</div>
@endsection