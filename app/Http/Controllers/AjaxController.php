<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Media;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use stdClass;

class AjaxController extends Controller {
	/**
	 * Create new employee
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
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

	/**
	 * Edit employee
	 *
	 * @param $id
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function editEmployee( $id, Request $request ) {
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

	/**
	 * Create new department
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
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

	/**
	 * Edit department
	 *
	 * @param $id
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function editDepartment( $id, Request $request ) {
		$department = Department::find( $id );
		if ( ! $department ) {
			abort( 403 );
		}

		$cover_id = $department->cover_id;

		if ( $request->hasFile( 'cover' ) ) {
			$file = $request->file( 'cover' );

			$name    = $file->getClientOriginalName();
			$arr_str = explode( '.', $name );

			if ( count( $arr_str ) > 1 ) {
				$miniType = $arr_str[ count( $arr_str ) - 1 ];
				$miniType = strtolower( $miniType );

				$name          = str_replace( '.' . $miniType, '', $name );
				$name          = str_slug( $name, '_' );
				$name_full     = $name . '.' . $miniType;
				$name_featured = 'featured.' . $miniType;

				$size = $file->getSize();

				$dir           = 'uploads/department/' . $id . '/';
				$path_origin   = $dir . $name_full;
				$path_featured = $dir . $name_featured;
				$url           = url( $dir ) . '/' . $name_full;
				$create_file   = [
					'name' => $name,
					'url'  => $url,
					'size' => $size,
					'type' => $miniType
				];
				$media         = Media::create( $create_file );
				$cover_id      = $media->id;

				Storage::put( $path_origin, file_get_contents( $file->getRealPath() ) );

				$size = config( 'image.size.department' );
				$img  = Image::make( $path_origin )->fit( $size[0], $size[1] );
				$img->save( $path_featured );
			}
		}

		$input = $request->only( [
			'name',
			'phone',
			'manager_id'
		] );

		$validator = Validator::make( $input, [
			'name'  => 'required',
			'phone' => 'required',
		] );

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			return redirect()->route( 'department.edit', $department->id )->withErrors( $errors );
		}

		$input['cover_id'] = $cover_id;
		$update            = $department->update( $input );

		return redirect()->route( 'department.show', $department->id );
	}

	/**
	 * Create new department
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function addUser( Request $request ) {
		$input = $request->only( [
			'name',
			'email',
		] );

		$validator = Validator::make( $input, [
			'name'  => 'required',
			'email' => 'required|unique:users|email',
		] );

		$response         = new stdClass();
		$response->return = true;
		$response->msg    = 'Creating successful new user!';

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			$response->return = false;
			$response->errors = $errors;

			$response->msg = 'Some fields are not valid!';

			return response()->json( $response );
		}

		$init_password           = str_random( 12 );
		$activated_code          = str_random( 30 );
		$input['password']       = bcrypt( $init_password );
		$input['activated_code'] = $activated_code;

		$user                 = User::create( $input );
		$response->employee   = $user;
		$response->http_refer = route( 'home' );

		Mail::send( 'auth.emails.create', [
			'password' => $init_password,
			'user'     => $user
		], function ( $m ) use ( $user ) {
			$m->to( $user->email, $user->name )->subject( 'Your account created.' );
		} );

		return response()->json( $response );
	}
}
