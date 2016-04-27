@extends('layouts.app')

@section('head.title')
    <title>{{ $employee->name }} - Employees</title>
@endsection

@section('navbar.left.admin')
    <li><a href="{{ $employee->edit_link() }}" title="Edit {{ $employee->name }}">Edit</a></li>
    <li><a class="f_delete" href="{{ $employee->delete_link() }}" title="Delete {{ $employee->name }}">Delete</a></li>
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="avatar">
                                    @if($employee->avatar)
                                        <img src="{{ $employee->avatar->get_url() }}" alt="Avatar's {{ $employee->name }}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Avatar's {{ $employee->name }}" class="img-responsive">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="f-heading">
                                    <h1 class="primary">{{ $employee->name }}</h1>
                                    <span class="line"></span>
                                </div>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $employee->name }}</td>
                                    </tr>

                                    @if ($employee->department)
                                        <tr>
                                            <td>Department</td>
                                            <td><a href="{{ $employee->department->permalink() }}#profile-{{ $employee->id }}">{{ $employee->department->name }}</a></td>
                                        </tr>
                                    @endif

                                    <tr>
                                        <td>Job title</td>
                                        <td>{{ $employee->job }}</td>
                                    </tr>

                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $employee->phone }}</td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $employee->email }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if ($employee->managers)
                            <div class="managers">
                                <h2>Manager</h2>
                                <div class="list-departments">
                                    @foreach($employee->managers as $department)
                                        <div>
                                            <a href="{{ $department->permalink() }}">{{ $department->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection