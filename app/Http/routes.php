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

    Route::get('/{id}', [
        'as' => 'department.show',
        'uses' => 'DepartmentController@show'
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

    Route::get('/{id}', [
        'as' => 'employee.show',
        'uses' => 'EmployeeController@show'
    ]);

    Route::get('/add', [
        'as' => 'employee.add',
        'uses' => 'EmployeeController@addShow',
    ]);

    Route::post('/add', [
        'as' => 'employee.add',
        'uses' => 'EmployeeController@addPost',
    ]);
});
