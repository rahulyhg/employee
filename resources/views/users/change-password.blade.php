@extends('layouts.app')

@section('head.title')
    <title>Change password</title>
@endsection

@section('content')
    @include('partials.notification')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Pleases change your password</div>
                        <div class="panel-body">
                            <?php
                            $form = [
                                    'defaults' => [
                                            'password'              => '',
                                            'password_confirmation' => '',
                                    ],
                                    'url'      => route( 'user.changePassword' ),
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