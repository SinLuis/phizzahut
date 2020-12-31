<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Phizza Hut</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: crimson">
            <div class="container" >
                <a class="navbar-brand" style="color: white" href="{{ url('/') }}">
                    <img src="/image/pizza.png" style="width: 50px;" alt="">
                    Phizza Hut
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                        @if (Auth::user()->role == 'admin')
                            @php
                                 $userId = Auth::user()->id;
                             @endphp
                            <a href="/transactionHistory/{{$userId}}" style="text-decoration: none; color: black; padding-top: 7px">View All User Transaction</a>
                             &nbsp;
                             <h5 style="padding-top: 7px">|</h5>
                             &nbsp;
                             <a href="/viewAllUser" style="text-decoration: none; color: black; padding-top: 7px">View All User</a>

                             @else
                             @php
                                 $userId = Auth::user()->id;
                             @endphp
                             <a href="/transactionHistory/{{$userId}}" style="text-decoration: none; color: black; padding-top: 7px">View Transaction History</a>
                                &nbsp;
                                <h5 style="padding-top: 7px">|</h5>
                                &nbsp;
                                <a href="/viewCart/{{$userId}}" style="text-decoration: none; color: black; padding-top: 7px">View Cart</a>
                        @endif
                        
                                
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
