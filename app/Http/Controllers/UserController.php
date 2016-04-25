<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller {
	public function create() {
		return view( 'users.create' );
	}

	public function profile() {
		return view( 'users.profile' );
	}
}
