@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Departments</div>

                    <div class="add">
                        @if(Auth::check())
                            <a class="btn btn-primary" href="#">Add department</a>
                        @endif
                    </div>

                    <div class="panel-body">
                        @foreach($departments as $index => $department)
                            @if(isset($department->manager->id))
                                <div>{{ $department->manager->name }}</div>
                            @else
                                <div>Not set</div>
                            @endif
                            <div class="department">
                                <div>
                                    <a href="{{ route('department.show', $department->id) }}">{{ $department->name }}</a>
                                </div>
                                <div>{{ $department->phone }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection