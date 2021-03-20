<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class DoctorController extends Controller
{
    public function DoctorProfile($id)
    {	
    	$profile = DB::table('doctors')
                 ->join('categories','doctors.department','categories.id')
                 ->join('city','doctors.location','city.id')
                 ->select('doctors.*','categories.treatment_name','city.city')
                 ->where('doctors.id', $id)
                 ->first();
        return view('frontend.doctor-profile',compact('profile')); 

    }
    public function DoctorBooking($id)
    {
        $booking = DB::table('doctors')
                 ->join('categories','doctors.department','categories.id')
                 ->select('doctors.*','categories.treatment_name')
                 ->where('doctors.id',$id)
                 ->first();
        return view('frontend.booking',compact('booking')); 
    }
    public function AllDoctor()
    {
        return view('frontend.search'); 
    }
    public function Search(Request $request)
    {
        $search = $request->specialist;
        $searchdoctor = DB::table('doctors')
                      ->join('categories','doctors.department','categories.id')
                      ->join('city','doctors.location','city.id')
                      ->select('doctors.*','categories.treatment_name','city.city')
                      ->where('doctors.department','LIKE', '%'.$search.'%')
                      ->orWhere('doctors.doctor_name','LIKE', '%'.$search.'%')
                      ->orWhere('doctors.chamber','LIKE', '%'.$search.'%')
                      ->orWhere('categories.treatment_name','LIKE', '%'.$search.'%')
                      ->get();
        return view('frontend.search-doctor',compact('searchdoctor'));
    }
}
