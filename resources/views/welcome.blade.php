@extends('layouts.app')

@section('head.title')
    <title>Welcome to Employee Directory</title>
@endsection

@section('content')
    <div class="top-search">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="top text-center">
                        <h2 class="text-uppercase">Welcome to <strong>Fries Team</strong></h2>
                        <p>You can Search by Over 60,000 Employees and 250 Departments</p>
                    </div>

                    <div class="bottom">
                        <form class="form-search" action="{{ url('/search') }}">
                            <input type="text" name="s">
                            <select name="department" id="search">
                                <option value="1">Phòng nhân sự</option>
                                <option value="2">Phòng marketing</option>
                                <option value="3">Phòng kế toán</option>
                            </select>
                            <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
