<?php

// Admin login route.......
Route::get('/admin','AdminController@admin');
Route::post('/adminlogin','AdminController@login_dashboard');
Route::get('/admin-dashboard','AdminController@admin_dashboard');
Route::get('/admin-profile','AdminController@AdminProfile');
Route::get('/logout','AdminController@logout');
Route::post('/password-change/{admin_id}','AdminController@PasswordChange');

// Doctors route in Admin Panel.......
Route::get('/add-treatment-category','CategoryController@AddCategory');
Route::post('/store-category','CategoryController@StoreCategory');
Route::get('/add-doctor','CategoryController@AddDoctor');
Route::post('/store-doctor','CategoryController@StoreDoctor');
Route::get('/all-doctor','CategoryController@AllDoctor');
Route::get('/view-doctor/{id}','CategoryController@ViewDoctor');
Route::get('/delete-doctor/{id}','CategoryController@DeleteDoctor');
Route::get('/edit-doctor/{id}','CategoryController@EditDoctor');
Route::post('/update-doctor/{id}','CategoryController@UpdateDoctor');


// Frontend route.......
Route::get('/','HomeController@index');
Route::get('/tc','HomeController@term');
Route::get('/login','HomeController@login');
Route::get('/register','HomeController@register');
Route::post('/patient-registration','HomeController@PatientRegistration');
Route::post('/patient-registration-checkout','HomeController@PatientRegistrationcheckout');
Route::post('/patient-login','HomeController@Patientlogin');
Route::get('/patient-logout','HomeController@Patientlogout');


// Doctor route.......
Route::get('/doctor-profile/{id}','DoctorController@DoctorProfile');
Route::get('/booking/{id}','DoctorController@DoctorBooking');
Route::get('/doctors','DoctorController@AllDoctor');
Route::get('/search','DoctorController@Search');


// Appointment route.......
Route::post('/take-appointment','AppointmentController@TakeAppointment');
Route::post('/store-appointment','AppointmentController@StoreAppointment');
Route::get('/booking-success','AppointmentController@BookSuccess');
Route::get('/all-appointments','AppointmentController@AllAppointment');
Route::get('/all-patients','AppointmentController@AllPatients');
Route::get('/delete-patient/{id}','AppointmentController@DeletePatients');
Route::get('/patient-dashboard','AppointmentController@PatientDashboard');
Route::get('/patient-proflie','AppointmentController@PatientProfile');

// Settings Route...................
Route::get('/settings','AdminController@Setting');
Route::post('/store-setting/{id}','AdminController@StoreSetting');






