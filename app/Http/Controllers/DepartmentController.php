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

        return view('departments.index')->with([
            'departments' => $departments
        ]);
    }

    public function show($id)
    {
        $id = intval($id);
        $department = Department::find($id);

        return view('departments.show')->with([
            'department' => $department
        ]);
    }
}
