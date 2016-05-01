@extends('layouts.app')

@section('head.title')
    <title>Search</title>
@endsection

@section('content')
    <main id="main">
        <div class="container">
            <div class="f-heading text-center">
                <h2 class="primary">Search results for: {{ $s }}</h2>
                @if ($employees->count() == 0)
                    <div class="secondary">Nothing found</div>
                @elseif($employees->count() == 1)
                    <div class="secondary">1 result</div>
                @else
                    <div class="secondary">{{ $employees->total() }} results</div>
                @endif
                <span class="line"></span>
            </div>

            <div class="row employees">
                @foreach($employees as $employee)
                    <div class="col-md-4" id="profile-{{ $employee->id }}">
                        <div class="employee">
                            <div class="img">
                                <a href="{{ $employee->permalink() }}">
                                    @if($employee->avatar)
                                        <img src="{{ $employee->avatar->get_url() }}" alt="Avatar's {{ $employee->name }}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('assets/images/avatar.jpg') }}" alt="Avatar's {{ $employee->name }}" class="img-responsive">
                                    @endif
                                </a>
                            </div>

                            <div class="details">
                                <h3 class="name"><a href="{{ route('employee.show', $employee->id) }}">{{ $employee->name }}</a></h3>
                                <div class="manager">Position: <strong>{{ $employee->job }}</strong></div>
                                <div class="employees">Email: <strong>{{ $employee->email }}</strong></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($employees->links())
                <div class="paging-container">
                    {!! $employees->links() !!}
                </div>
            @endif
        </div>
    </main>
@endsection