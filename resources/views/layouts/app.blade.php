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

<body style="font-family: 'Montserrat', sans-serif;">
    <div id="app">
        <nav style="z-index: 10;"
            class="flex navbar navbar-expand-lg navbar-light bg-light shadow position-fixed l-0 r-0">

            <div class="container-fluid text-center">
                <a class="navbar-brand ms-4 d-none d-lg-block" href="{{ url('/') }}">
                    <img style="width: 150px; height: 50px;" src="{{ asset('img/logo.png') }}" alt="">
                </a>

                @auth
                    @livewire('notifications-home')
                @endauth

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item mt-1 mb-2">
                            <a class="nav-link shadow-sm rounded {{ Request::is('/') ? 'bg-primary rounded text-white' : '' }}"
                                href="{{ route('inicio') }}">
                                <span>
                                    <i class="fa-solid fa-house"></i>
                                    Inicio
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2 mt-1 mb-2">
                            <a class="nav-link shadow-sm rounded {{ Request::is('platillos') ? 'bg-primary rounded text-white' : '' }}"
                                href="{{ route('menu') }}">
                                <span>
                                    <i class="fa-solid fa-utensils"></i>
                                    Menú
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2 mt-1 mb-2">
                            <a class="nav-link shadow-sm rounded" href="{{ route('home') }}">
                                <span>
                                    <i class="fa-solid fa-bell"></i>
                                    Timbre
                                </span>
                            </a>
                        </li>
                        <li class="nav-item ms-2 mt-1 mb-2">
                            <a class="nav-link shadow-sm rounded {{ Request::is('nosotros') ? 'bg-primary rounded text-white' : '' }}"
                                href="/nosotros">
                                <span>
                                    <i class="fa-solid fa-address-card"></i>
                                    Nosotros
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
                                <li class="nav-item mt-1 mb-2">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <span>
                                            <i class="fa-solid fa-user-lock fs-3" title="Iniciar sesión en tu cuenta."></i>
                                        </span>
                                    </a>
                                </li>
                            @endif

                        @else
                            <div class="dropdown">
                                <a class="dropdown nav-link" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>
                                        <i class="fa-solid fa-user-check"></i>
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>
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
                                                <i style="font-size: 20px;"
                                                    class="fa-solid fa-right-from-bracket text-danger"></i>
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
@include('layouts.footer')

</html>
