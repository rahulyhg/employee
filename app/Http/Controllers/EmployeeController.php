<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index')->with([
            'employees' => $employees
        ]);
    }

    public function show($id)
    {
        $id = intval($id);
        $employee = Employee::find($id);

        return view('employees.show')->with([
            'employee' => $employee
        ]);
    }
}
