<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

use App\Http\Requests;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return response()->json($departments);
    }
}
