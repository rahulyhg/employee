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

    public function show($id)
    {
        $id = intval($id);
        $department = Department::find($id);
        $employees = $department->employees->toArray();

        dd($employees);

        return response()->json($employee);
    }
}
