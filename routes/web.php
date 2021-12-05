<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home.index');


Route::group( ['middleware' => ['auth']], function() {

// Department with EmployeController
Route::get('/manage_department', 'EmployeController@index')->name('manage_department.index');
Route::get('/add_department', 'EmployeController@create')->name('add_department.create');
Route::post('/add_department/store', 'EmployeController@store')->name('store');

Route::get('/manage_department/{id}/edit_department', 'EmployeController@edit')->name('edit');
Route::patch('/manage_department/{id}', 'EmployeController@update')->name('update');

Route::delete('/manage_department/{id}', 'EmployeController@destroy')->name('manage_department.destroy');
// End Department with EmployeController


//  DesignationController 
Route::get('/manage_designation', 'DesignationController@index')->name('manage_designation.index');

Route::get('/add_designation', 'DesignationController@create')->name('add_designation.create');
Route::post('/add_designation/store', 'DesignationController@store')->name('store');

Route::get('/manage_designation/{id}/edit_designation', 'DesignationController@edit')->name('edit');
Route::patch('/manage_designation/{id}', 'DesignationController@update')->name('update');

Route::delete('/manage_designation/{id}', 'DesignationController@destroy')->name('manage_designation.destroy');
// End DesignationController 

//  AddEmployeeController 
Route::get('/manage_employee', 'AddEmployeeController@index')->name('manage_employee.index');

Route::get('/add_employee', 'AddEmployeeController@create')->name('add_employee.create');
Route::post('/add_employee/store', 'AddEmployeeController@store')->name('store');

Route::get('/manage_employee/{id}/edit_employee', 'AddEmployeeController@edit')->name('edit');
Route::patch('/manage_employee/{id}', 'AddEmployeeController@update')->name('update');

Route::delete('/manage_employee/{id}', 'AddEmployeeController@destroy')->name('manage_employee.destroy');
// End AddEmployeeController 

//  LeaveController 
Route::get('/manage_leave_type', 'LeaveController@index')->name('manage_leave_type.index');

Route::get('/add_leave_type', 'LeaveController@create')->name('add_leave_type.create');
Route::post('/add_leave_type/store', 'LeaveController@store')->name('add_leave_type.store');

Route::get('/manage_leave_type/{id}/edit_leave_type', 'LeaveController@edit')->name('edit');
Route::patch('/manage_leave_type/{id}', 'LeaveController@update')->name('update');

Route::delete('/manage_leave_type/{id}', 'LeaveController@destroy')->name('manage_leave_type.destroy');
// End LeaveController 


//  ManagementController 

Route::get('/all_leave', 'ManagementController@all_leave')->name('all_leave');

Route::get('/update_status/{id}/{status}', 'ApplyLeaveController@update_status')->name('update_status');

Route::get('/pending_leave', 'ManagementController@pending_leave')->name('pending_leave');

Route::get('/approve_leave', 'ManagementController@approve_leave')->name('approve_leave');

Route::get('/not_approve_leave', 'ManagementController@not_approve_leave')->name('not_approve_leave');

// End ManagementController


//  AdduserController 
Route::get('/manage_user', 'AdduserController@index')->name('manage_user.index');

Route::get('/status_update/{id}', 'AdduserController@status_update')->name('status_update');

Route::get('/add_user', 'AdduserController@create')->name('add_user.create');
Route::post('/add_user/store', 'AdduserController@store')->name('store');

Route::get('/manage_user/{id}/edit_user', 'AdduserController@edit')->name('edit');
Route::patch('/manage_user/{id}', 'AdduserController@update')->name('update');

Route::delete('/manage_user/{id}', 'AdduserController@destroy')->name('manage_user.destroy');
// End AdduserController 

// Start ReportController here

Route::get('/reports', 'ReportsController@report')->name('reports.report');

// End ReportController here


// Start LeaveDeatailsController

Route::get('/leave_datails', 'LeaveDeatailsController@details')->name('leave_datails.datails');

// End LeaveDeatailsController

});




Route::get('/employee', 'GuestController@index')->name('home.index');

// Route::group( ['middleware' => ['guest']], function() {
   
// });

Route::get('/leave_status', 'ApplyLeaveController@index')->name('leave_status.index');

Route::get('/apply_leave', 'ApplyLeaveController@create')->name('apply_leave.create');
Route::post('/apply_leave/store', 'ApplyLeaveController@store')->name('store');

Route::get('/leave_status/{id}/edit_leave', 'ApplyLeaveController@edit')->name('edit');
Route::patch('/leave_status/{id}', 'ApplyLeaveController@update')->name('update');