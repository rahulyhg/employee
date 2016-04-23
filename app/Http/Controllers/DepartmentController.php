<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

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

		return view( 'departments.create', [
			'employees' => $employees
		] );
	}

	public function edit( $id ) {
		$employees  = Employee::all();
		$department = Department::find( $id );

		return view( 'departments.edit', [
			'employees'  => $employees,
			'department' => $department
		] );
	}
}
