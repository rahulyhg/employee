<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('head.title')

    <link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    @yield('head')
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="img-responsive">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @if (Auth::check())
                    @yield('navbar.left.admin')
                @else
                    @yield('navbar.left.guest')
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Ekko::isActiveRoute('employee.index') }}"><a href="{{ route('employee.index') }}">Employees</a></li>
                <li class="{{ Ekko::isActiveRoute('department.index') }}"><a href="{{ route('department.index') }}">Departments</a></li>

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" class="login">Login</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('employee.add') }}"><i class="fa fa-btn fa-user-plus" aria-hidden="true"></i>Create employee</a></li>
                            <li><a href="{{ route('department.add') }}"><i class="fa fa-btn fa-medkit" aria-hidden="true"></i>Create department</a></li>
                            <li><a href="{{ route('user.add') }}"><i class="fa fa-btn fa-user-secret" aria-hidden="true"></i>Create user</a></li>
                            <li><a href="{{ route('user.profile') }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit profile</a></li>

                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer f-table">
    <div class="f-table-cell">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 copy-right">Designed by Tu TV. Powered by Fries Team.</div>

                <div class="pull-right">
                    <a href="#" class="btn f-button back-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('body.scripts')
</body>
</html>
