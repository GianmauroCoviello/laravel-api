<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        
        
        <!-- Scripts -->
        @vite(['resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" id="app">
        <div class="container-fluid">
            <div class="row">
                
                <div class="sidebars pt-3">
                    <div class="d-flex">
                        <i class="fa-solid fa-newspaper pe-3 pt-4 text-white"></i>
                        <h1 class="text-white p-2"><em>Boolfolio</em> </h1>
                    </div>
                    
                    <hr class="text-white">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item d-flex">
                            <i class="fa-solid fa-right-to-bracket fa-xl pe-3 pt-4 text-white"></i>
                            <h4><a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a></h4>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item d-flex">
                            <i class="fa-solid fa-user-plus fa-xl pe-3 pt-4 text-white"></i>
                            <h4><a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a></h4>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown d-flex">
                            <i class="fa-solid fa-user fa-xl pe-3 pt-4 text-white"></i>
                           <a id="navbarDropdown" class="nav-link dropdown-toggle user text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                <div class="navBar pt-4 scroll-bar">
                    


                    @yield('content')

                    

                </div>

            
            </div>
        </div>
    </body>
</html>