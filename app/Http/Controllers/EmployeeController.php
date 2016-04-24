<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller {
	public function index() {
		$paging_employee = config( 'paging.employee' );

		$employees = Employee::paginate( $paging_employee );

		return view( 'employees.index' )->with( [
			'employees' => $employees
		] );
	}

	/**
	 * Show employee details by id
	 *
	 * @param $id
	 *
	 * @return mixed
	 */
	public function show( $id ) {
		$id       = intval( $id );
		$employee = Employee::find( $id );

		if ( ! $employee ) {
			abort( 404 );
		}

		return view( 'employees.show' )->with( [
			'employee' => $employee
		] );
	}

	public function addShow() {
		$departments = Department::all();

		return view( 'employees.create', [
			'departments' => $departments
		] );
	}

	public function editShow( $id ) {
		$employee    = Employee::find( $id );
		if ( ! $employee ) {
			return redirect()->route( 'employee.index' );
		}

		$departments = Department::all();

		return view( 'employees.edit', [
			'employee'    => $employee,
			'departments' => $departments
		] );

	}
}
