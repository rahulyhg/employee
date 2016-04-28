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

	/**
	 * Edit department
	 *
	 * @param $id
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function editPath( $id, Request $request ) {
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
