@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $department->name }}</div>

                    <div class="panel-body">
                        @if(isset($department->manager->id))
                            <div>{{ $department->manager->name }}</div>
                        @else
                            <div>Not set</div>
                        @endif
                        <div class="department">
                            <div>
                                {{ $department->name }}
                            </div>
                            <div>{{ $department->phone }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection