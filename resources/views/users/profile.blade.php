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
                        <div class="panel-heading">Your profile</div>
                        <div class="panel-body">
                            <?php
                            $user = Auth::user();
                            $form = [
                                    'defaults' => [
                                            'name'  => $user->name,
                                            'email' => $user->email,
                                    ],
                                    'url'      => route( 'ajax.user.add' ),
                                    'method'   => 'POST',
                                    'button'   => 'Save'
                            ];
                            ?>
                            @include('users.profile-form')
                        </div>
                    </div>

                    <hr>

                    <div class="panel panel-default">
                        <div class="panel-heading">Change password</div>
                        <div class="panel-body">
                            <?php
                            $form = [
                                    'defaults' => [
                                            'password'  => '',
                                            'confirm_password' => '',
                                    ],
                                    'url'      => route( 'ajax.user.add' ),
                                    'method'   => 'POST',
                                    'button'   => 'Save'
                            ];
                            ?>
                            @include('users.password-form')
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