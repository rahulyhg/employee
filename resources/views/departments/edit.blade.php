@extends('layouts.app')

@section('head.title')
    <title>Edit {{ $department->name }} - Departments</title>
@endsection

@section('navbar.left.admin')
    <ul class="nav navbar-nav">
        <li><a href="{{ $department->permalink() }}" title="View {{ $department->name }}">View</a></li>
    </ul>
@endsection

@section('content')
    @include('partials.notification')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Featured Image</div>

                        <div class="panel-body">
                            @include('departments.cover')
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
                                            'name'       => $department->name,
                                            'phone'      => $department->phone,
                                            'manager_id' => $department->manager_id,
                                    ],
                                    'url'      => route( 'department.edit', $department->id ),
                                    'method'   => 'POST',
                                    'button'   => 'Update'
                            ];
                            ?>
                            @include('departments.form')
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