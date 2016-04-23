<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use stdClass;

class AjaxController extends Controller {
	public function addEmployee( Request $request ) {
		$input = $request->only( [
			'name',
			'email',
			'phone',
			'job',
			'department_id'
		] );

		$validator = Validator::make( $input, [
			'name'  => 'required',
			'phone' => 'required',
			'job'   => 'required',
			'email' => 'required|unique:employees|email',
		] );

		$response         = new stdClass();
		$response->return = true;
		$response->msg    = 'Creating successful new employee!';

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			$response->return = false;
			$response->errors = $errors;

			$response->msg = 'Some fields are not valid!';

			return response()->json( $response );
		}

		$employee             = Employee::create( $input );
		$response->employee   = $employee;
		$response->http_refer = route( 'employee.show', $employee->id );

		return response()->json( $response );
	}

	public function editEmployee( $id, Request $request ) {

		$input = $request->only( [
			'name',
			'email',
			'phone',
			'job',
			'department_id'
		] );

		$employee = Employee::find( $id );

		$validate_email = 'required|unique:employees|email';
		if ( $employee->email == $input['email'] ) {
			$validate_email = 'required|email';
		}

		$validator = Validator::make( $input, [
			'name'  => 'required',
			'phone' => 'required',
			'job'   => 'required',
			'email' => $validate_email,
		] );

		$response         = new stdClass();
		$response->return = true;
		$response->msg    = 'Updating successful employee!';

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			$response->return = false;
			$response->errors = $errors;

			$response->msg = 'Some fields are not valid!';

			return response()->json( $response );
		}

		$update = $employee->update( $input );
		if ( $update ) {
			$response->employee   = $employee;
			$response->http_refer = route( 'employee.show', $employee->id );
		} else {
			$response->return = false;
			$response->errors = [ ];
			$response->msg    = 'Some thing went wrong!';

			return response()->json( $response );
		}


		return response()->json( $response );
	}

	public function addDepartment( Request $request ) {
		$input = $request->only( [
			'name',
			'phone',
			'manager_id'
		] );

		$validator = Validator::make( $input, [
			'name'  => 'required',
			'phone' => 'required',
		] );

		$response         = new stdClass();
		$response->return = true;
		$response->msg    = 'Creating successful new department!';

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			$response->return = false;
			$response->errors = $errors;

			$response->msg = 'Some fields are not valid!';

			return response()->json( $response );
		}

		$department           = Department::create( $input );
		$response->employee   = $department;
		$response->http_refer = route( 'department.show', $department->id );

		return response()->json( $response );
	}
}
