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

    <div id='app' class="public-blog">
        <header>
            <div class="blog-nav">
            @if(isset($menus['primary'][0]))
                @component('layouts.components.main-menu', ['menu' => $menus['primary'][0] ])
                @endcomponent
            
            @else
                @component('layouts.components.main-menu', ['menu' => false])
                @endcomponent
            @endif

            </div>  
        </header>


        
        
        <div class="container">
            
                <main role="main">
                    <div>
                        @yield('content')
                    </div>
                </main>
            
            
            
        
        </div>
        
        

        
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
