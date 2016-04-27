@extends('layouts.app')

@section('head.title')
    <title>{{ $department->name }} - Departments</title>
@endsection

@section('navbar.left.admin')
    <li><a href="{{ $department->edit_link() }}" title="Edit {{ $department->name }}">Edit</a></li>
    <li><a class="f_delete" href="{{ $department->delete_link() }}" title="Delete {{ $department->name }}">Delete</a></li>
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
                        <div class="icon">
                            <i class="fa fa-user-secret" aria-hidden="true"></i>
                            <div class="cap">Manager</div>
                        </div>
                        @if($department->manager)
                            <div class="des">{{ $department->manager->name }}</div>
                        @else
                            <div class="des">Not set</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box border-right">
                        <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <div class="cap">Phone number</div>
                        </div>
                        <div class="des">{{ $department->phone }}</div>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ">
                        <div class="icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <div class="cap">Employee numbers</div>
                        </div>

                        <div class="des">{{ $department->totalEmployees() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="f-heading text-center">
            <h2 class="primary">Employees</h2>
            <div class="secondary">Employees lorem ipsum ext sane uet.</div>
            <span class="line"></span>
        </div>

        <div class="row employees">
            @if($department->manager)
                <div class="col-md-4" id="profile-{{ $department->manager->id }}">
                    <div class="employee manager">
                        <div class="img">
                            <a href="{{ $department->manager->permalink() }}">
                                @if($department->manager->avatar)
                                    <img src="{{ $department->manager->avatar->get_url() }}" alt="Avatar's {{ $department->manager->name }}" class="img-responsive">
                                @else
                                    <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Avatar's {{ $department->manager->name }}" class="img-responsive">
                                @endif
                            </a>
                        </div>

                        <div class="details">
                            <h3 class="name"><a href="{{ route('employee.show', $department->manager->id) }}">{{ $department->manager->name }}</a></h3>
                            <div class="manager">Position: <strong>{{ $department->manager->job }}</strong></div>
                            <div class="employees">Email: <strong>{{ $department->manager->email }}</strong></div>
                        </div>
                    </div>
                </div>
            @endif
            @foreach($department->employees as $employee)
                <div class="col-md-4" id="profile-{{ $employee->id }}">
                    <div class="employee">
                        <div class="img">
                            <a href="{{ $employee->permalink() }}">
                                @if($employee->avatar)
                                    <img src="{{ $employee->avatar->get_url() }}" alt="Avatar's {{ $employee->name }}" class="img-responsive">
                                @else
                                    <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Avatar's {{ $employee->name }}" class="img-responsive">
                                @endif
                            </a>
                        </div>

                        <div class="details">
                            <h3 class="name"><a href="{{ route('employee.show', $employee->id) }}">{{ $employee->name }}</a></h3>
                            <div class="manager">Position: <strong>{{ $employee->job }}</strong></div>
                            <div class="employees">Email: <strong>{{ $employee->email }}</strong></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection