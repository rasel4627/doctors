<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class HomeController extends Controller
{
    public function index()
    {
    	return view('frontend.index');
    }
    public function term()
    {
        return view('frontend.term-condition');
    }
    public function login()
    {
    	return view('frontend.login');
    }
    public function register()
    {
    	return view('frontend.register');
    }
    public function PatientRegistration(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['password'] = md5($request->password);
        $patient_id = DB::table('patient')->insertGetId($data);
        
        Session::put('patient_id',$patient_id);
        return Redirect::to('/');
    }
    public function PatientRegistrationcheckout(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['age'] = $request->age;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['password'] = md5($request->password);
        $patient_id = DB::table('patient')->insertGetId($data);
        
        Session::put('patient_id',$patient_id);
        return Redirect::to('/');
    }
    public function Patientlogin(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('patient')
                 ->where('email',$email)
                 ->where('password',$password)
                 ->first();

        if($result){
              Session::put('patient_id',$result->id);
              return Redirect::to('/');
        }else{
              return Redirect::to('/login');
        }
    }
    public function Patientlogout()
    {
        Session::flush();
        return Redirect::to('/');
    }

}
