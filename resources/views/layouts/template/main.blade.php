<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Atencion al cliente</title>

    @include('layouts.template.styles')
</head>

<body class="layout-boxed alt-menu">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
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

</body>
</html>
