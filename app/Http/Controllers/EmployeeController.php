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

    public function addPost(Request $request)
    {
        $input = $request->only([
            'name',
            'email',
            'phone',
            'job',
            'department_id'
        ]);

        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required',
            'job' => 'required',
            'email' => 'required|email|unique:employees',
            'department_id' => 'required',
        ]);

        dd($validator);

        $employee = Employee::create($input);
        if (!$employee) {
            $departments = Department::all();
            return view('employees.add', [
                'departments' => $departments
            ])->withErrors([
                'test' => 'Hello'
            ]);
        }

        return redirect()->route('employee.show', $employee->id);
    }
}
