<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Atencion al cliente</title>

    @include('layouts.template.styles')

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>

<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    @include('layouts.template.navbar')

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sidebar-closed" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('layouts.template.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <div class="row layout-top-spacing">
                        @yield('content')
                    </div>
                </div>

            </div>


            @include('layouts.template.footer')
        </div>

        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @include('layouts.template.scripts')

    @vite(['resources/js/app.js'])
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

</html>
