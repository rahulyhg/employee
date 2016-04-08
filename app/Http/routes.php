<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

/**
 * Department
 */
Route::group(['prefix' => 'department'], function () {
    Route::get('/', [
        'as' => 'department.index',
        'uses' => 'DepartmentController@index'
    ]);
});

/**
 * Employee
 */
Route::group(['prefix' => 'employee'], function () {
    Route::get('/', [
        'as' => 'employee.index',
        'uses' => 'EmployeeController@index'
    ]);
});
