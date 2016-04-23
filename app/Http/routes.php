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

Route::get( '/', [
	'as' => 'home',
	'uses' => 'HomeController@index'
] );

Route::auth();

/**
 * Department
 */
Route::group( [ 'prefix' => 'departments' ], function () {
	Route::get( '/', [
		'as'   => 'department.index',
		'uses' => 'DepartmentController@index'
	] );

	Route::get( 'add', [
		'as'   => 'department.add',
		'uses' => 'DepartmentController@add',
	] );

	Route::get( '{id}', [
		'as'   => 'department.show',
		'uses' => 'DepartmentController@show'
	] )->where( 'id', '[0-9]+' );
} );

/**
 * Employee
 */
Route::group( [ 'prefix' => 'employees' ], function () {
	Route::get( '/', [
		'as'   => 'employee.index',
		'uses' => 'EmployeeController@index'
	] );

	Route::get( 'add', [
		'as'   => 'employee.add',
		'uses' => 'EmployeeController@addShow',
	] );

	Route::get( 'edit/{id}', [
		'as'   => 'employee.edit',
		'uses' => 'EmployeeController@editShow',
	] )->where( 'id', '[0-9]+' );

	/**
	 * Show
	 */
	Route::get( '{id}', [
		'as'   => 'employee.show',
		'uses' => 'EmployeeController@show'
	] )->where( 'id', '[0-9]+' );
} );

/**
 * Ajax
 */
Route::group( [ 'prefix' => 'ajax' ], function () {
	Route::group( [ 'prefix' => 'employee' ], function () {
		Route::post( 'add', [
			'as'   => 'ajax.employee.add',
			'uses' => 'AjaxController@addEmployee',
		] );

		Route::post( 'edit/{id}', [
			'as'   => 'ajax.employee.edit',
			'uses' => 'AjaxController@editEmployee',
		] );
	} );

	Route::group( [ 'prefix' => 'department' ], function () {
		Route::post( 'add', [
			'as'   => 'ajax.department.add',
			'uses' => 'AjaxController@addDepartment',
		] );

		Route::post( 'edit', [
			'as'   => 'ajax.department.edit',
			'uses' => 'AjaxController@editDepartment',
		] );
	} );
} );