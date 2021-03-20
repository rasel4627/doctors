@extends('layout')
@section('content')
@php
    $doctors = DB::table('doctors')
            ->join('categories','doctors.department','categories.id')
            ->select('doctors.*','categories.treatment_name')
            ->get();
@endphp
<div class="card">
<div class="card-body">
<h2 class="card-title">Data table</h2>
<div class="row">
  <div class="col-12">
    <table id="order-listing" class="table table-striped" style="width:100%;">
      <thead>
        <tr>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Image</th>
            <th>Department</th>
            <th>Degree</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($doctors as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->doctor_name}}</td>
            <td><img src="{{URL::to($row->image)}}" height="80" width="100"></td>
            <td>{{$row->treatment_name}}</td>
            <td>{{$row->degree}}</td>
            <td>
              <a href="{{ url('/view-doctor/'.$row->id)}}"><button class="btn btn-outline-primary">View</button></a>
              <a href="{{ url('/edit-doctor/'.$row->id)}}"><button class="btn btn-outline-primary">Edit</button></a>
              <a href="{{ url('/delete-doctor/'.$row->id)}}" id="delete"><button class="btn btn-outline-danger">Delete</button></a>
            </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
@endsection