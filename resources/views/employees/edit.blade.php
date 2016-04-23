@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
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
                                ],
                                'url'      => route( 'ajax.employee.edit', $employee->id ),
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
@endsection

@section('body.scripts')
    <script src="{{ asset('assets/js/form.js') }}"></script>
@endsection