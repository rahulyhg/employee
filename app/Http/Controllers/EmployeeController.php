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

        return response()->json($employees);
    }
}
