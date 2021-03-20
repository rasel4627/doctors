@extends('layout')
@section('content')

<div class="card">
<div class="card-body">
<h2 class="card-title">Appointment table</h2>
<div class="row">
  <div class="col-12">
    <table id="order-listing" class="table table-striped" style="width:100%;">
      <thead>
        <tr>
            <th>Doctor Name</th>
            <th>Speciality</th>
            <th>Patient Name</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Fees</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($AllAppointment as $row)
        <tr>
            <td>{{$row->doctor_name}}</td>
            <td>{{$row->speciality}}</td>
            <td>{{$row->patient_name}}</td>
            <td>{{ date('d F Y', strtotime($row->appointment_date)) }}</td>
            <td>{{ date('g:i A', strtotime($row->appointment_time)) }}</td>
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