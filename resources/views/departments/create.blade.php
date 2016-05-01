@extends('layouts.app')
@section('head.title')
    <title>Create new department</title>
@endsection

@section('content')
    <main id="main">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Add new</div>

                            <div class="panel-body">
                                <?php
                                $form = [
                                        'defaults' => [
                                                'name'       => '',
                                                'phone'      => '',
                                                'manager_id' => '',
                                        ],
                                        'url'      => route( 'ajax.department.add' ),
                                        'method'   => 'POST',
                                        'button'   => 'Add new'
                                ];
                                ?>
                                @include('departments.form-create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('body.scripts')
    <script src="{{ asset('assets/js/form.js') }}"></script>
@endsection