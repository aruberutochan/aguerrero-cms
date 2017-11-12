<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <a class="navbar-brand" href="/">aguerrero.es</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
            @if($menu)
                <ul class="navbar-nav mr-auto {{$menu->css_class}}" id="{{$menu->css_id ? $menu->css_id : hash('md5', $menu->id)}}"> 
                    @foreach($menu->links as $link)
                    <li class="nav-item">
                        <a  id="{{$link->css_id ? $link->css_id : hash('md5', $link->id)}}" class="nav-link {{$link->css_class}}" href="{{$link->url}}">{{$link->name}}</a>
                    </li>
                    @endforeach                
                </ul>
               
            @else
            <ul class="navbar-nav mr-auto"> 
                           
            </ul>

            @endif
            <ul class="navbar-nav mr-right">

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @else
                <li class="nav-item dropdown">

                    <a class="btn btn-primary dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ion-ios-person navbar-user"></span>
                        {{ Auth::user()->name }}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <span class="ion-ios-log-out"></span> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                         <a class="dropdown-item" href="/admin">
                            <span class="ion-ios-settings"></span> Admin
                        </a>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>