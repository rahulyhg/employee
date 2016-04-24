@extends('layouts.app')

@section('head.title')
    <title>Employees</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>

                    <div class="panel-body">
                        @foreach($employees as $index => $employee)
                            <div class="employee">
                                <div>
                                    <a href="{{ route('employee.show', $employee->id) }}">{{ $employee->name }}</a>
                                </div>
                                @if($employee->department)
                                    <div>{{ $employee->department->name }}</div>
                                @endif
                                <div>{{ $employee->email }}</div>
                                <div>{{ $employee->phone }}</div>
                                <div>{{ $employee->job }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection