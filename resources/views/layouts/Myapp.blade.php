<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'School Camp') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!--script -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/LineIcons.2.0.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <!-- Tiny Slider  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tiny-slider.css') }}">
    @livewireStyles
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-cyan-400 shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    School Camp
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth()

                    <ul class="navbar-nav mr-auto">
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link text-white"><i class="fab text-info"></i>Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/registroalumno/create') }}" class="nav-link text-white"><i class="fab    text-info"></i> Registrate a un taller</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/events') }}" class="nav-link text-white"><i></i> Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/tallers') }}" class="nav-link text-white"><i></i> Talleres</a>
                        </li>

                    </ul>
                    @else
                    <ul class="navbar-nav mr-auto">
                        <!--Nav Bar Hooks - Do not delete!!-->
                        <li class="nav-item">
                            <a href="{{ url('/events') }}" class="nav-link text-white"><i></i> Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/tallers') }}" class="nav-link text-white"><i></i> Talleres</a>
                        </li>

                    </ul>
                    @endauth()

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/users')  }}">
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar Sesión') }}
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

        <main class="py-2">
            @yield('content2')
        </main>
    </div>
</body>