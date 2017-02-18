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

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::prefix('settings')->namespace('Settings')->group(function () {
    Route::resource('department', 'DepartmentController');
    Route::resource('course', 'CourseController', [
        'except' => ['create']
    ]);
});


Route::prefix('enquiries')->namespace('AdmissionEnquiry')->group(function () {
    Route::name('degree.print')->get('degree/{enquiry}/print', 'DegreeEnquiryController@printEnquiry');
    Route::resource('degree', 'DegreeEnquiryController', [
        'parameters' => ['degree' => 'enquiry'],
        'except' => ['edit']
    ]);
});