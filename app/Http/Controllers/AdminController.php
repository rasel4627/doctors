<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class AdminController extends Controller
{
     public function admin()
     {
        return view('admin.admin_login');
     }

     public function admin_dashboard()
     {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
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

     public function login_dashboard(Request $request)
     {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('admins')
                ->where('admin_email',$admin_email)
                ->where('admin_password',$admin_password)
                ->first();

        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin-dashboard');
        }else{
            Session::put('exception','Email or Password Invalid');
            return Redirect::to('/admin');
        }
     }

     public function AdminProfile()
     {
         return view('admin.view_profile');
     }

     public function PasswordChange(Request $request,$admin_id)
     {
          $this->AdminAuthCheck();
          $profile = DB::table('admins')->where('admin_id',$admin_id)->first();
          $oldpassword = $profile->admin_password;
          $currentpassword = md5($request->current_password);
          $newpassword = md5($request->new_password);
          $confirmnewpassword = md5($request->confirm_new_password);

          if($oldpassword == $currentpassword){
             if($newpassword == $confirmnewpassword){
                 $data = array();
                 $data['admin_password'] = md5($request->confirm_new_password);
                 $changepassword = DB::table('admins')->update($data);

                 if($changepassword){
                  $notification = array(
                      'message' => 'Password Successfully Changed !!',
                      'alert-type' => 'success'
                      );
                  return Redirect::to('/admin-dashboard')->with($notification);
            }
             }else{
                $notification = array(
                      'message' => 'New Password Not matched !!',
                      'alert-type' => 'error'
                      );
                  return Redirect()->back()->with($notification);
             }
          }else{
            $notification = array(
                      'message' => 'Current Password Not matched !!',
                      'alert-type' => 'error'
                      );
                  return Redirect()->back()->with($notification);
          }

     }
     
     public function logout()
     {
        Session::flush();
        return Redirect::to('/admin');
     }

    public function Setting()
    {
        $this->AdminAuthCheck();
        return view('admin.category.setting');
    }
    public function StoreSetting(Request $request,$id)
    {
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_website'] = $request->company_website;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['company_fb'] = $request->company_fb;
        $data['company_address'] = $request->company_address;
        $data['company_city'] = $request->company_city;
        $image = $request->file('logo');

        if($image){
          $image_name = str_random(20);
          $text = strtolower($image->getClientOriginalExtension());
          $image_full_name = $image_name.'.'.$text;
          $upload_path = 'public/image/';
          $image_url = $upload_path.$image_full_name;
          $success = $image->move($upload_path,$image_full_name);
          $data['logo'] = $image_url;

          unlink($request->old_one);

          DB::table('setting')->where('id',$id)->update($data);
          $notification = array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
            );
          return Redirect::to('/settings')->with($notification);
        }else{
          DB::table('setting')->where('id',$id)->update($data);
          $notification = array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
            );
          return Redirect::to('/settings')->with($notification);
        }
    }
   
}
