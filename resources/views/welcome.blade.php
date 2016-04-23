@extends('layouts.app')

@section('head.title')
    <title>Welcome to Employee Directory</title>
@endsection

@section('content')
    <div class="top-search f-table">
        <div class="f-table-cell">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="top text-center">
                            <h2 class="text-uppercase">Welcome to <strong>Fries Team</strong></h2>
                            <p>You can search by Over 60,000 Employees and 250 Departments</p>
                        </div>

                        <div class="bottom">
                            <form class="form-search" action="{{ url('/search') }}">
                                <div class="row">
                                    <div class="col-md-9 left">
                                        <input type="text" name="s" class="form-control" placeholder="Search employees">
                                        <select name="department" id="search">
                                            <option value="0">Departments</option>
                                            <option value="1">Phòng nhân sự</option>
                                            <option value="2">Phòng marketing</option>
                                            <option value="3">Phòng kế toán</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
