<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use stdClass;

class AjaxController extends Controller
{
    public function addEmployee(Request $request)
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
            'email' => 'required|unique:employees|email',
            'department_id' => 'required',
        ]);

        $response = new stdClass();
        $response->return = true;
        $response->msg = 'Creating successful new employee!';

        if ($validator->fails()) {
            $errors = $validator->errors()->getMessages();

            $response->return = false;
            $response->errors = $errors;
            $response->msg = 'Some fields are not valid!';

            return response()->json($response);
        }

        $employee = Employee::create($input);
        $response->employee = $employee;
        $response->http_refer = route('employee.show', $employee->id);

        return response()->json($response);
    }
}
