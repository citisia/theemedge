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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::prefix('settings')->namespace('Settings')->group(function () {
    Route::resource('department', 'DepartmentController');
    Route::resource('course', 'CourseController', [
        'except' => ['create']
    ]);
});


Route::prefix('enquiries')->namespace('AdmissionEnquiry')->group(function () {
    Route::name('degree.print')
        ->get('degree/{enquiry}/print', 'DegreeEnquiryController@printEnquiry');
    Route::name('degree.approve')
        ->post('degree/{enquiry}/approve', 'DegreeEnquiryController@approveEnquiry');
    Route::name('degree.reject')
        ->post('degree/{enquiry}/reject', 'DegreeEnquiryController@rejectEnquiry');
    Route::resource('degree', 'DegreeEnquiryController', [
        'parameters' => ['degree' => 'enquiry'],
        'except' => ['edit']
    ]);

    Route::name('enquiry.comment')->post('comment','EnquiryCommentController');
});

Route::prefix('candidates')->namespace('AdmissionCandidate')->name('candidates.')->group(function () {
    Route::resource('degree','DegreeCandidateController', [
        'parameters' => ['degree' => 'candidate']
    ]);
});