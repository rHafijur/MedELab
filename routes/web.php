<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    // return App\WordAdmin::find(1);
    // return auth()->user()->wordAdmin->word;
	   // return auth()->user()->type;
	//    return App\PathologyDepartment::find(1)->tests[0]->subtests[0]->test->pathology_department->title;
	// dd(App\Patient::find(1)->prescriptions()->orderBy('id','desc')->get());
	dd(App\Prescription::find(5)->medicines[0]->pivot->morning);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth','superAdmin'])->group(function () {
Route::get('/superadmin', 'SuperAdminController@index');
Route::get('/superadmin/generatelabel', 'SuperAdminController@generatelabel');
Route::post('/superadmin/generatelabel', 'SuperAdminController@showGeneratedLabel');
Route::get('/register_user',function(){
	return view('superadmin.register_user');
});
Route::post('/register_user', 'SuperAdminController@registerUser');
Route::get('/tests', 'TestController@index');
Route::get('/test/{id}', 'TestController@show');
Route::get('/delete_test/{id}', 'TestController@delete');
Route::post('/create_test', 'TestController@create');
Route::post('/update_test', 'TestController@update');
Route::post('/update_subtest', 'SubtestController@update');
Route::post('/create_subtest', 'TestController@create');
});


Route::middleware(['auth','wordAdmin'])->group(function () {
Route::get('/word_admin',function(){
	return view('wordadmin.home');
});

Route::get('/register_patient',function(){
	return view('wordadmin.register_patient');
});

Route::post('register_patient', 'WordAdminController@registerPatient');
Route::get('patients','WordAdminController@patients');
Route::get('word_admin/patient/{id}','WordAdminController@patient');
Route::post('word_admin/assign_doctor','PatientController@assignDoctor');
Route::post('word_admin/add_prescription','PatientController@addPrescription');

});

Route::middleware(['auth','patient'])->group(function () {
	Route::get('/patient','PatientController@index');	
	Route::post('/patient/set_tube_id','PatientController@setTubeId');	
});

Route::middleware(['auth','counterAdmin'])->group(function () {
	Route::get('/counter_admin','CounterAdminController@index');	
	Route::post('/counter_admin/prescriptions','CounterAdminController@patientPrescriptions');	
	Route::post('/counter_admin/save_payment','PaymentController@save_payment');	
	Route::get('/counter_admin/prescriptions/make_payment/{prescription_id}','PaymentController@make_payment');	
	Route::get('/counter_admin/invoice/{payment_id}','PaymentController@invoice');	
});

Route::get('patient_id_card/{id}','PatientController@generateIdCard');
Route::get('prescription/{id}','PrescriptionController@show');