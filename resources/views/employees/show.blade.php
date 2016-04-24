@extends('layouts.app')

@section('head.title')
    <title>{{ $employee->name }} - Employees</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $employee->name }}</div>

                    <div class="panel-body">
                        <div class="employee">
                            @if (!$employee->managers->isEmpty())
                                <strong>Quản lý: </strong>
                                @foreach($employee->managers as $index => $manager)
                                    {{ $manager->name }},
                                @endforeach
                            @endif
                            <div>{{ $employee->name }}</div>
                            @if($employee->department)
                                <div>{{ $employee->department->name }}</div>
                            @endif
                            <div>{{ $employee->email }}</div>
                            <div>{{ $employee->phone }}</div>
                            <div>{{ $employee->job }}</div>

                            @if(Auth::check())
                                <a href="{{ route('employee.edit', $employee->id) }}">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection