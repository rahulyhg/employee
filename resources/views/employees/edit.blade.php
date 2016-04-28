@extends('layouts.app')

@section('head.title')
    <title>Edit employee - {{ $employee->name }}</title>
@endsection

@section('navbar.left.admin')
    <ul class="nav navbar-nav">
        <li><a href="{{ $employee->permalink() }}" title="View {{ $employee->name }}">View</a></li>
    </ul>
@endsection

@section('content')
    @include('partials.notification')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Avatar</div>

                        <div class="panel-body">
                            @include('employees.avatar')
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">Edit</div>

                        <div class="panel-body">
                            <?php
                            $form = [
                                    'defaults' => [
                                            'name'          => $employee->name,
                                            'email'         => $employee->email,
                                            'phone'         => $employee->phone,
                                            'job'           => $employee->job,
                                            'department_id' => $employee->department_id,
                                            'avatar'        => '',
                                    ],
                                    'url'      => route( 'employee.edit', $employee->id ),
                                    'method'   => 'POST',
                                    'button'   => 'Update'
                            ]
                            ?>
                            @include('employees.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('body.scripts')
    <script src="{{ asset('assets/js/form.js') }}"></script>
@endsection