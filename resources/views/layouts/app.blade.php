<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('icon/icon.ico') }}" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap');
    </style>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/css/app.css'])

    @include('layouts.global-styles')
    @livewireStyles
</head>

<body style="font-family: 'Montserrat', sans-serif;
">
    <div id="app">
        <nav style="z-index: 4;"
            class="flex navbar navbar-expand-md navbar-light bg-white shadow-sm position-fixed l-0 r-0">

            <div style="max-width: 100rem;" class="container">
                <a class="navbar-brand ms-4" href="{{ url('/') }}">
                    <img style="width: 150px; height: 50px;" src="{{ asset('img/logo.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'RouteActive' : '' }}"
                                href="{{ route('inicio') }}">
                                <span>
                                    <i class="fa-solid fa-house"></i>
                                    Inicio
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link {{ Request::is('menu') ? 'RouteActive' : '' }}"
                                href="{{ route('menu') }}">
                                <span>
                                    <i class="fa-solid fa-utensils"></i>
                                    Menú
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('home') }}">
                                <span>
                                    <i class="fa-solid fa-bell"></i>
                                    Timbre
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('home') }}">
                                <span>
                                    <i class="fa-solid fa-address-card"></i>
                                    Quienes somos
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('home') }}">
                                <span>
                                    <i class="fa-solid fa-gear"></i>
                                    Nuestros servicios
                                </span>
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        {{-- Notifications --}}

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @livewire('notifications-home')

                            <div class="dropdown dropstart">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                    <li class="p-1">
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            <span>
                                                <i style="font-size: 20px;" class="fa-solid fa-gauge text-warning"></i>
                                                Ir al panel
                                            </span>
                                        </a>
                                    </li>
                                    <li class="p-1">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <span>
                                                <i style="font-size: 20px;" class="fa-solid fa-right-from-bracket text-danger"></i>
                                                {{ __('Cerrar sesión') }}
                                            </span>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            @yield('content')
        </main>
    </div>
    @livewireScripts
    @auth
        <script>
            window.onload = function() {
                Echo.private('App.Models.User.' + {{ Auth::user()->id }})
                    .notification((notification) => {
                        Livewire.emit('notification')
                        console.log(notification.type);
                    });
            }
            window.Livewire.on('notification-received', msg => {

                Swal.fire({
                    icon: 'info',
                    background: '#191E3A',
                    color: '#fff',
                    confirmButtonColor: '#3085d6',
                    title: 'Has recibido una nueva notificación',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
            })
        </script>
    @endauth

</body>
<footer class="bd-footer bg-light shadow-lg">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-3">
                <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/"
                    aria-label="Bootstrap">
                    <img width="200px" src="{{ asset('img/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                <h5>Nosotros</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a style="text-decoration: none;" href="/">
                        <span>
                            <i class="fa-solid fa-phone"></i>
                            Contáctanos
                        </span>
                    </a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
                <h5>Guides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="text-decoration-none" href="/docs/5.0/getting-started/">Getting started</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="/docs/5.0/examples/starter-template/">Starter template</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="/docs/5.0/getting-started/webpack/">Webpack</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="/docs/5.0/getting-started/parcel/">Parcel</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
                <h5>Servicios</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/bootstrap">Bootstrap 5</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/bootstrap/tree/v4-dev">Bootstrap 4</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/icons">Icons</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/rfs">RFS</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/bootstrap-npm-starter">npm starter</a></li>
                </ul>
            </div>
            <div class="col-6 col-lg-2 mb-3">
                <h5>Community</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/bootstrap/issues">Issues</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/twbs/bootstrap/discussions">Discussions</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://github.com/sponsors/twbs">Corporate sponsors</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://opencollective.com/bootstrap">Open Collective</a></li>
                    <li class="mb-2"><a class="text-decoration-none" href="https://stackoverflow.com/questions/tagged/bootstrap-5">Stack
                            Overflow</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

</html>
