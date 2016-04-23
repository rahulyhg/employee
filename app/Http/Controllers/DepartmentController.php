<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;

class DepartmentController extends Controller {
	public function index() {
		$departments = Department::all();

		return view( 'departments.index' )->with( [
			'departments' => $departments
		] );
	}

	public function show( $id ) {
		$department = Department::find( $id );

		return view( 'departments.show' )->with( [
			'department' => $department
		] );
	}

	public function add() {
		$employees = Employee::all();

		return view( 'departments.add', [
			'employees' => $employees
		] );
	}
}
