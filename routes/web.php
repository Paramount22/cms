<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', function () {
    return view('admin.dashboard.index');
});

Route::middleware(['has.permission'])->group(function () {
    Route::resource('departments', 'DepartmentController');
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('leaves', 'LeaveController');
    Route::post('accept-reject-leave/{id}', 'LeaveController@acceptReject')->name('accept.reject');
    Route::resource('notices', 'NoticeController');
    // mail
    Route::get('/mail', 'MailController@create')->name('mails.create');
    Route::post('/mail', 'MailController@store')->name('mails.store');
});
