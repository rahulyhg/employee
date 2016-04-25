@extends('layouts.app')

@section('head.title')
    <title>Create new user</title>
@endsection

@section('content')
    @include('partials.notification')
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
                                    'url'      => route( 'user.profile' ),
                                    'method'   => 'POST',
                                    'button'   => 'Save'
                            ];
                            ?>
                            @include('users.profile-form')
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Change password</div>
                        <div class="panel-body">
                            <?php
                            $form = [
                                    'defaults' => [
                                            'password'              => '',
                                            'password_confirmation' => '',
                                    ],
                                    'url'      => route( 'user.password' ),
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