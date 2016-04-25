<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller {
	public function index() {
		$paging_department = config( 'paging.department' );

		$departments = Department::paginate( $paging_department );

		return view( 'departments.index' )->with( [
			'departments' => $departments
		] );
	}

	public function show( $id ) {
		$department = Department::find( $id );
		if ( ! $department ) {
			abort( 404 );
		}

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
		if ( ! $department ) {
			return redirect()->route( 'department.index' );
		}

		return view( 'departments.edit', [
			'employees'  => $employees,
			'department' => $department
		] );
	}

	public function delete( $id ) {
		$department = Department::find( $id );
		if ( ! $department ) {
			return redirect()->route( 'department.index' );
		}

		$department->delete();
		Employee::where( 'department_id', $id )
		          ->update( [
			          'department_id' => 0
		          ] );

		return redirect()->route( 'department.index' );
	}
}
