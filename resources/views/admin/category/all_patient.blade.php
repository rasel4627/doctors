@extends('layout')
@section('content')

<div class="card">
<div class="card-body">
<h2 class="card-title">Patients Table</h2>
<div class="row">
  <div class="col-12">
    <table id="order-listing" class="table table-striped" style="width:100%;">
      <thead>
        <tr>
            <th>ID</th>
            <th>Patient Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Last Visit date</th>
            <th>Fees</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($AllPatient as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->patient_name}}</td>
            <td>{{$row->patient_age}}</td>
            <td>{{$row->patient_email}}</td>
            <td>{{$row->patient_phone}}</td>
            <td>{{$row->patient_address}}</td>
            <td>{{ date('d F Y', strtotime($row->appointment_date)) }}</td>
            <td>{{$row->consulting_fee}}</td>
            <td>
              <a href="{{ url('/delete-patient/'.$row->id)}}" id="delete"><button class="btn btn-outline-danger">Delete</button></a>
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