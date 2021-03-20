<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class CategoryController extends Controller
{
    public function AddCategory()
    {
    	$this->AdminAuthCheck();
    	return view('admin.category.addcategory');
    }
    public function StoreCategory(Request $request)
    {
    	$validatedData = $request->validate([
        'treatment_name' => 'required|unique:categories|max:55',
        ]);

	    $data = array();
  		$data['treatment_name'] = $request->treatment_name;
  		$addcat = DB::table('categories')->insert($data);
  		if($addcat){
               $notification = array(
                'message' => 'Treatment Category Successfully Added !!',
                'alert-type' => 'success'
                );
          return Redirect()->back()->with($notification);
         }
    }
    public function AddDoctor()
    {
    	 $this->AdminAuthCheck();
    	 return view('admin.category.adddoctor');
    }
    public function StoreDoctor(Request $request)
    {
        $data = array();
        $data['doctor_name'] = $request->doctor_name;
        $data['department'] = $request->department;
        $data['degree'] = $request->degree;
        $data['visit_time'] = $request->visit_time;
        $data['visit_day'] = $request->visit_day;
        $data['consulting_fee'] = $request->consulting_fee;
        $data['contact_number'] = $request->contact_number;
        $data['chamber'] = $request->chamber;
        $data['location'] = $request->city;
        $image = $request->file('image');

        if($image) {
          $image_name = str_random(20);
          $text = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$text;
          $upload_path = 'public/image/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path,$image_full_name);
          if($success){
             $data['image'] = $image_url;
             DB::table('doctors')->insert($data);
             $notification = array(
              'message' => 'Doctor Successfully added !!',
              'alert-type' => 'success'
              );
             return Redirect()->back()->with($notification);
          }
        }
    }
    public function AllDoctor()
    {
        $this->AdminAuthCheck();
        return view('admin.category.alldoctor');
    }
    public function ViewDoctor($id)
    {
        $this->AdminAuthCheck();
        $viewdoctors = DB::table('doctors')
                     ->join('categories','doctors.department','categories.id')
                     ->select('doctors.*','categories.treatment_name')
                     ->where('doctors.id', $id)
                     ->first();
        return view('admin.category.view_doctor',compact('viewdoctors')); 
    }
    public function EditDoctor($id)
    {
        $this->AdminAuthCheck();
        $edit = DB::table('doctors')
              ->where('id',$id)
              ->first();
        return view('admin.category.editdoctor',compact('edit'));
    }
    public function UpdateDoctor(Request $request,$id)
    {
        $data = array();
        $data['doctor_name'] = $request->doctor_name;
        $data['department'] = $request->department;
        $data['degree'] = $request->degree;
        $data['visit_time'] = $request->visit_time;
        $data['visit_day'] = $request->visit_day;
        $data['consulting_fee'] = $request->consulting_fee;
        $data['contact_number'] = $request->contact_number;
        $data['chamber'] = $request->chamber;
        $data['location'] = $request->location;
        $image = $request->file('image');

        if($image){
          $image_name = str_random(20);
          $text = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$text;
          $upload_path = 'public/image/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path,$image_full_name);
          $data['image'] = $image_url;

          unlink($request->old_one);

          DB::table('doctors')->where('id',$id)->update($data);
          $notification = array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
            );
          return Redirect::to('/all-doctor')->with($notification);
        }else{
          DB::table('doctors')->where('id',$id)->update($data);
          $notification = array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
            );
          return Redirect::to('/all-doctor')->with($notification);
        }
    }

    public function DeleteDoctor($id)
    {
        $this->AdminAuthCheck();
        $image = DB::table('doctors')->where('id',$id)->first();
        $deleteimage = $image->image;
        unlink($deleteimage);
        $deletedoctor = DB::table('doctors')
                       ->where('id',$id)
                       ->delete();

        if($deletedoctor){
              $notification = array(
                  'message' => 'Doctor Successfully Deleted !!',
                  'alert-type' => 'error'
                  );
              return Redirect::to('/all-doctor')->with($notification);
        }
    }






    public function AdminAuthCheck()
     {
        $admin_id = Session::get('admin_id');
        
        if($admin_id) {
            return;
        }else{
            return Redirect::to('/admin')->send();
        }   
     }
}
