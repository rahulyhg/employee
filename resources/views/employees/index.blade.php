@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees</div>

                    <div class="add">
                        @if(Auth::check())
                            <a class="btn btn-primary" href="#">Add employee</a>
                        @endif
                    </div>

                    <div class="panel-body">
                        @foreach($employees as $index => $employee)
                            <div class="employee">
                                <div>
                                    <a href="{{ route('employee.show', $employee->id) }}">{{ $employee->name }}</a>
                                </div>
                                <div>{{ $employee->department->name }}</div>
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