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
    return App\WordAdmin::all();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/superadmin', 'SuperAdminController@index');
Route::get('/superadmin/generatelabel', 'SuperAdminController@generatelabel');
Route::post('/superadmin/generatelabel', 'SuperAdminController@showGeneratedLabel');
Route::get('/register_user',function(){
	return view('superadmin.register_user');
});
Route::post('/register_user', 'SuperAdminController@registerUser');