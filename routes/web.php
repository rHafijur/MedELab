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
});


Route::middleware(['auth','wordAdmin'])->group(function () {
Route::get('/word_admin',function(){
	return view('wordadmin.home');
});

Route::get('/register_patient',function(){
	return view('wordadmin.register_patient');
});
Route::post('/register_patient', 'WordAdminController@registerPatient');
Route::get('/patients','WordAdminController@patients');
Route::get('word_admin/patient/{id}','WordAdminController@patient');
Route::post('word_admin/assign_doctor','PatientController@assignDoctor');
Route::post('word_admin/add_prescription','PatientController@addPrescription');

});
Route::get('patient_id_card/{id}','PatientController@generateIdCard');