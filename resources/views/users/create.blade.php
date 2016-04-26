@extends('layouts.app')

@section('head.title')
    <title>Create new user</title>
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Create new user</div>
                        <div class="panel-body">
                            <div class="notify"></div>
                            <?php
                            $form = [
                                    'defaults' => [
                                            'name'  => '',
                                            'email' => '',
                                    ],
                                    'url'      => route( 'ajax.user.add' ),
                                    'method'   => 'POST',
                                    'button'   => 'Add new'
                            ];
                            ?>
                            @include('users.form')
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
