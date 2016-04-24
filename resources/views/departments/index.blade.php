@extends('layouts.app')

@section('head.title')
    <title>Departments</title>
@endsection

@section('content')
    <div class="content">
        <div class="departments">
            <div class="container">
                <div class="f-heading text-center">
                    <h2 class="primary">Departments</h2>
                    <div class="secondary">Employees lorem ipsum ext sane uet.</div>
                    <span class="line"></span>
                </div>

                <div class="row">
                    @foreach($departments as $index => $department)
                        <div class="col-md-4">
                            <div class="department">
                                <div class="img">
                                    <a href="{{ $department->permalink() }}" title="{{ $department->name }}">
                                        <img src="{{ asset('assets/images/department_test.jpg') }}" alt="test" class="img-responsive">
                                    </a>
                                </div>

                                <div class="details">
                                    <h3 class="name"><a href="{{ $department->permalink() }}">{{ $department->name }}</a></h3>
                                    <div class="manager">Manager: <strong>{{ $department->manager->name }}</strong></div>
                                    <div class="employees">Employees: <strong>{{ $department->employees->count() }}</strong></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($departments->links())
                    <div class="paging-container">
                        {!! $departments->links() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection