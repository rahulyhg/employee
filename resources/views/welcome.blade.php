@extends('layouts.app')

@section('head.title')
    <title>Welcome to Employee Directory</title>
@endsection

@section('content')
    <div class="top-search heading-top f-table">
        <div class="f-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="top text-center">
                            <h2 class="text-uppercase">Welcome to <strong>Fries Team</strong></h2>
                            <p>You can search by over {{ $employees->count() }} Employees and {{ $departments->count() }} Departments</p>
                        </div>

                        <div class="bottom">
                            <form class="form-search" action="{{ url('/search') }}">
                                <div class="row">
                                    <div class="col-md-9 left">
                                        <input type="text" name="s" class="form-control" placeholder="Search employees">
                                        <select name="department" id="search">
                                            <option value="0">All departments</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-default f-button"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <a href="{{ route('department.show', $department->id) }}" title="{{ $department->name }}">
                                    @if ($department->cover)
                                        <img class="img-responsive" src="{{ $department->get_url_featured() }}" alt="{{ $department->cover->get_name() }}">
                                    @else
                                        <img src="{{ asset('assets/images/department_test.jpg') }}" alt="Department featured default" class="img-responsive">
                                    @endif
                                </a>
                            </div>

                            <div class="details">
                                <h3 class="name"><a href="{{ route('department.show', $department->id) }}">{{ $department->name }}</a></h3>
                                @if($department->manager)
                                    <div class="manager">Manager: <strong>{{ $department->manager->name }}</strong></div>
                                @else
                                    <div class="manager">Manager: <strong>Not set</strong></div>
                                @endif
                                <div class="employees">Employees: <strong>{{ count($department->employees) }}</strong></div>
                            </div>
                        </div>
                    </div>
                    @if ($index == 5)
                        @break
                    @endif
                @endforeach
            </div>

            <div class="paging-container f-component">
                <a href="{{ route('department.index') }}" class="btn btn-default f-button">More departments</a>
            </div>
        </div>
    </div>
@endsection
