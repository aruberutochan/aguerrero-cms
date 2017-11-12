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
    <div id="app" class='admin-dashboard'>

        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/admin"><span class="ion-ios-settings"></span> Dashboard </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/"><span class="ion-md-home"></span>  Blog  </a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav mr-right">
                
                        <li class="nav-item dropdown">
                        
                            <a class="btn btn-outline-primary dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="ion-ios-contact navbar-user"></span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </li>
                    </ul>
                    
                </div>
            </nav>
        </header>

        <div class="container-fluid">
                <div class="row">
                    <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/post"> <span class="ion-ios-paper-plane"> </span> Posts </a>
                            </li>
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="/admin/post/create" class="nav-link"> <span class="ion-ios-add"> </span> Add Post </a>                                
                                </li>
                            </ul>
                        </ul>
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/page"> <span class="ion-ios-document"> </span> Pages</a>
                            </li>
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="/admin/page/create" class="nav-link"><span class="ion-ios-add"> </span> Add Page </a>                                
                                </li>
                            </ul>
                        </ul>

                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/users"> <span class="ion-ios-person"> </span> Users</a>
                            </li>
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="/admin/users/create" class="nav-link"> <span class="ion-ios-add"> </span> Add User </a>                                
                                </li>
                            </ul>
                            
                        </ul>
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/menu"> <span class="ion-ios-menu"> </span> Menus</a>
                            </li>
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="/admin/menu/create" class="nav-link"><span class="ion-ios-add"> </span> Add Menu </a>                                
                                </li>
                            </ul>
                        </ul>
                         <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/taxonomy"> <span class="ion-ios-pricetag"> </span> Taxonomies</a>
                            </li>                            
                        </ul>
                    </nav>
                </div>

                <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     {{--  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.css" rel="stylesheet">  --}}
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote-bs4.js"></script>  --}}
    <script src="{{ asset('js/app.js') }}"></script>
        <script>
      $('.summernote').summernote({
        tabsize: 2,
        height: 200
      });
    </script>

</body>

</html>
