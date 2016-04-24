@extends('layouts.app')

@section('head.title')
    <title>{{ $department->name }} - Departments</title>
@endsection

@section('content')
    <div class="heading-top f-table">
        <div class="f-table-cell">
            <div class="container text-center">
                <h1>{{ $department->name }}</h1>
            </div>
        </div>
    </div>

    <div class="department-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box border-right">
                        <div class="icon"><i class="fa fa-user-secret" aria-hidden="true"></i></div>
                        @if($department->manager)
                            <div class="des">{{ $department->manager->name }}</div>
                        @else
                            <div class="des">Not set</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box border-right">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class="des">{{ $department->phone }}</div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ">
                        <div class="icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>

                        <div class="des">{{ $department->employees->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $department->name }}</div>

                    <div class="panel-body">
                        @if(isset($department->manager->id))
                            <div>{{ $department->manager->name }}</div>
                        @else
                            <div>Not set</div>
                        @endif
                        <div class="department">
                            <div>
                                {{ $department->name }}
                            </div>
                            <div>{{ $department->phone }}</div>

                            @if(Auth::check())
                                <a href="{{ route('department.edit', $department->id) }}">Edit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection