<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Media;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
		$employee = Employee::find( $id );
		if ( ! $employee ) {
			return redirect()->route( 'employee.index' );
		}

		$departments = Department::all();

		return view( 'employees.edit', [
			'employee'    => $employee,
			'departments' => $departments
		] );
	}
	/**
	 * Edit employee
	 *
	 * @param $id
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function editPath( $id, Request $request ) {
		$employee = Employee::find( $id );
		if ( ! $employee ) {
			return redirect()->route( 'home' );
		}

		$avatar_id = $employee->avatar_id;

		if ( $request->hasFile( 'avatar' ) ) {
			$file = $request->file( 'avatar' );

			$name    = $file->getClientOriginalName();
			$arr_str = explode( '.', $name );

			if ( count( $arr_str ) > 1 ) {
				$miniType = $arr_str[ count( $arr_str ) - 1 ];

				$name      = str_replace( '.' . $miniType, '', $name );
				$name      = str_slug( $name, '_' );
				$miniType  = strtolower( $miniType );
				$name_full = $name . '.' . $miniType;

				$size = $file->getSize();

				$dir         = 'uploads/employee/' . $id . '/';
				$path        = $dir . $name_full;
				$url         = url( $dir ) . '/' . $name_full;
				$create_file = [
					'name' => $name,
					'url'  => $url,
					'size' => $size,
					'type' => $miniType
				];

				Storage::put( $path, file_get_contents( $file->getRealPath() ) );

				$size = config( 'image.size.employee' );
				$img  = Image::make( $path )->fit( $size[0], $size[1] );
				$img->save( $path );

				$media     = Media::create( $create_file );
				$avatar_id = $media->id;
			}
		}

		$input = $request->only( [
			'name',
			'email',
			'phone',
			'job',
			'department_id'
		] );

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

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			return redirect()->route( 'employee.show', $employee->id )->withErrors( $errors );
		}

		$input['avatar_id'] = $avatar_id;
		$update             = $employee->update( $input );
		if ( $update ) {
			return redirect()->route( 'employee.show', $employee->id )->withErrors( 'Some thing went wrong!' );
		}

		return redirect()->route( 'employee.show', $employee->id );
	}


	public function delete( $id ) {
		$employee = Employee::find( $id );
		if ( ! $employee ) {
			return redirect()->route( 'employee.index' );
		}

		$employee->delete();
		Department::where( 'manager_id', $id )
		          ->update( [
			          'manager_id' => null
		          ] );

		return redirect()->route( 'employee.index' );
	}
}
