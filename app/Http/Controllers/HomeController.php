<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Http\Requests;
use Illuminate\Http\Request;
use League\Flysystem\Config;

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
		$departments = Department::paginate( 6 );
		$employees   = Employee::all();


		return view( 'welcome', [
			'departments' => $departments,
			'employees'   => $employees
		] );
	}
}
