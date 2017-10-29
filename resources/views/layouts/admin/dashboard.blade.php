<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Task List
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="fa fa-user"> </span> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="/customers"><span class="fa fa-user"> </span> Customers </a></li>                        
                        <li><a href="/events"><span class="fa fa-bolt"> </span> Events</a></li>
                        <li><a href="/products"><span class="fa fa-cube"> </span> Products</a></li>
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href="/segments"><span class="fa fa-pie-chart"> </span> Segments</a></li>
                        <li><a href=""><span class="fa fa-paper-plane"> </span> Campaigns</a></li>
                        <li><a href=""><span class="fa fa-area-chart"> </span> Reports</a></li>
                        <li><a href=""><span class="fa fa-paint-brush"> </span> Email Composer</a></li>
                       
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href=""><span class="fa fa-eye"> </span> The Others</a></li>
                        <li><a href=""><span class="glyphicon glyphicon-fire"> </span> White Walkers</a></li>
                       
                    </ul>
                    <ul class="nav nav-sidebar">
                        <li><a href=""><span class="fa fa-cog"> </span> Configuration</a></li>
                        <li><a href=""><span class="fa fa-exchange"> </span> Import/Export</a></li>
                        <li><a href=""><span class="fa fa-bullseye"> </span> Logs</a></li>
                        <li><a href="/tasks"><span class="fa fa-tasks"> </span> Tasks</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- JavaScripts -->
       
        {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>  


    </body>
</html>

