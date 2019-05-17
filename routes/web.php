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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('index');
Route::get('/student', 'DashboardController@students_show');

#Students Personal Information URLs
Route::get('/student/add', 'DashboardController@student_add');
Route::post('/student/store', 'DashboardController@student_store');
Route::get('/student/{id}/edit', 'DashboardController@student_edit');
Route::post('/student/{id}/update', 'DashboardController@student_update');



Route::post('/api/ussd','USSDController@index');
Route::get('/sendMessage/{id}', 'SMSController@test');


Route::get('/print/allStudents','ExportExcelController@allStudents');
Route::get('/print/academicReports','ExportExcelController@academicReports');
Route::get('/print/in_session', 'ExportExcelController@inSession');

Route::get('/test', 'DashboardController@test');