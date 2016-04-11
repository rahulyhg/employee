<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index')->with([
            'employees' => $employees
        ]);
    }

    /**
     * Show employee details by id
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $id = intval($id);
        $employee = Employee::find($id);

        return view('employees.show')->with([
            'employee' => $employee
        ]);
    }

    public function addShow()
    {
        $departments = Department::all();
        return view('employees.add', [
            'departments' => $departments
        ]);
    }

    public function editShow($id)
    {
        $id = intval($id);
        $employee = Employee::find($id);
        $departments = Department::all();

        return view('employees.edit', [
            'employee' => $employee,
            'departments' => $departments
        ]);

    }
}