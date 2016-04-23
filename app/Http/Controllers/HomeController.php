<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$departments = Department::all();
		$employees   = Employee::all();

		return view( 'welcome', [
			'departments' => $departments,
			'employees'   => $employees
		] );
	}
}
