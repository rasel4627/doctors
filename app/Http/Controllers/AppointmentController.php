<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AppointmentController extends Controller
{
     public function TakeAppointment(Request $request)
     {
     	  Session::put('date',$request->date);
     	  Session::put('time',$request->time);
     	  return view('frontend.checkout');
     }
     public function StoreAppointment(Request $request)
     {
         $patient_id = Session::get('patient_id');
     	 $data = array();
         $data['patient_name'] = $request->patient_name;
         $data['patient_id'] = $patient_id;
         $data['patient_age'] = $request->patient_age;
         $data['patient_email'] = $request->patient_email;
         $data['patient_phone'] = $request->patient_phone;
         $data['patient_address'] = $request->patient_address;
         $data['doctor_name'] = $request->doctor_name;
         $data['speciality'] = $request->speciality;
         $data['appointment_date'] = $request->appointment_date;
         $data['appointment_time'] = $request->appointment_time;
         $data['consulting_fee'] = $request->consulting_fee;
         $data['payment_method'] = $request->payment_method;

         $appointment_id = DB::table('appointment')->insertGetId($data);
         return Redirect::to('/booking-success');
     }
     public function BookSuccess()
     {
     	  return view('frontend.booking-success');
     }
     public function AllAppointment()
     {
         $AllAppointment =  DB::table('appointment')->get();
         return view('admin.category.all_appointment',compact('AllAppointment'));
     }
     public function AllPatients()
     {
     	 $AllPatient =  DB::table('appointment')->get();
         return view('admin.category.all_patient',compact('AllPatient'));
     }
     public function DeletePatients($id)
     {
	      $deletepatient = DB::table('appointment')
	                       ->where('id',$id)
	                       ->delete();

	        if($deletepatient){
	              $notification = array(
	                  'message' => 'Successfully Deleted !!',
	                  'alert-type' => 'error'
	                  );
	              return Redirect::to('/admin-dashboard')->with($notification);
	        }
     }
     public function PatientDashboard()
     {
          $patient_id = Session::get('patient_id');
          $patientdashboard = DB::table('appointment')
                       ->join('doctors','appointment.doctor_name','doctors.doctor_name')
                       ->join('patient','appointment.patient_id','patient.id')
                       ->select('appointment.*','doctors.chamber')
                       ->where('appointment.patient_id',$patient_id)
                       ->get();

         if($patient_id){
            return view('frontend.patient-dashboard',compact('patientdashboard'));
         }else{
            return Redirect::to('/login');
         } 
     }
     public function PatientProfile()
     {
          $patient_id = Session::get('patient_id');
          $patient = DB::table('patient')
                   // ->join('doctors','patient.doctor_name','doctors.doctor_name')
                   // ->select('patient.*','doctors.chamber')
                   ->where('patient.id',$patient_id)
                   ->first();
         if($patient_id){
            return view('frontend.patient-profile',compact('patient'));
         }else{
            return Redirect::to('/login');
         }
     }
}
