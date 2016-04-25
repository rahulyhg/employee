<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use stdClass;

class UserController extends Controller {
	public function create() {
		return view( 'users.create' );
	}

	public function profile() {
		return view( 'users.profile' );
	}

	/**
	 * Path change password
	 *
	 * @param Request $request
	 *
	 * @return mixed
	 */
	public function pathPassword( Request $request ) {
		$user = $request->user();

		if ( ! $user ) {
			abort( 403 );
		}

		$input = $request->only( [
			'password',
			'password_confirmation'
		] );

		$validator = Validator::make( $input, [
			'password'              => 'required|confirmed|min:8',
			'password_confirmation' => 'required',
		] );

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			return redirect()->route( 'user.profile' )->withErrors( $errors );
		}

		$update = $user->update( [
			'password' => bcrypt( $input['password'] ),
		] );

		return redirect()->route( 'user.profile' )->withSuccess( 'Update password successful!' );
	}

	public function pathProfile( Request $request ) {
		$user = $request->user();

		if ( ! $user ) {
			abort( 403 );
		}

		$input = $request->only( [
			'name',
		] );

		$validator = Validator::make( $input, [
			'name' => 'required',
		] );

		if ( $validator->fails() ) {
			$errors = $validator->errors()->getMessages();

			return redirect()->route( 'user.profile' )->withErrors( $errors );
		}

		$update = $user->update( $input );

		return redirect()->route( 'user.profile' )->withSuccess( 'Update profile successful!' );
	}
}
