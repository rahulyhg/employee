<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller {
	public function searchEmployee( Request $request ) {
		$s             = $request->get( 's' );
		$department_id = $request->get( 'department' );
		$department_id = intval( $department_id );

		$employees = Employee::where( 'name', 'like', "%$s%" );
		if ( $department_id > 0 ) {
			$employees = $employees->where( 'department_id', '=', $department_id );
		}
		$paging_employee = config( 'paging.employee' );
		$employees       = $employees->paginate( $paging_employee );
		$employees->appends( [
			's'          => $s,
			'department' => $department_id
		] );

		return view( 'employees.search', [
			'employees' => $employees
		] );
	}
}
