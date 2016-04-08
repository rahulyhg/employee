@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $employee->name }}</div>

                    <div class="panel-body">
                        <div class="employee">
                            <div>{{ $employee->name }}</div>
                            <div>{{ $employee->department->name }}</div>
                            <div>{{ $employee->email }}</div>
                            <div>{{ $employee->phone }}</div>
                            <div>{{ $employee->job }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection