<link rel="icon" type="image/x-icon" href="{{ asset('icon/icon.ico') }}"/>
<link rel="stylesheet" href="{{ asset('layouts/vertical-dark-menu/css/light/loader.css') }}">
<link rel="stylesheet" href="{{ asset('layouts/vertical-dark-menu/css/dark/loader.css') }}">

<script src="{{ asset('layouts/vertical-dark-menu/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

<link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('layouts/vertical-dark-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('layouts/vertical-dark-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
{{--
    <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" /> --}}
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

<style>
    .unreadColor {
        background: rgb(255, 239, 239);
    }

    .fondoAzul {
        background: #0275d8 !important;
        color: #fff;
    }

    .btn-neon {
        position: relative;
        display: inline-block;
        padding: 15px 30px;
        color: #fff;
        font-size: 24px;
        overflow: hidden;
        transition: 0.2s;
        border: 0px;
        width: 200px;
        height: 200px;
    }

    .btn-neon:hover {
        background: ##f0ad4e;
        box-shadow: 0 0 10px #f0ad4e, 0 0 40px #f0ad4e, 0 0 80px #f0ad4e;
        transition-delay: 0.4s;
        color: #fff;
    }

    .btn-neon span{
        position: absolute;
        display: block;
    }

    #span1{
        top: 0;
        left: -100%;
        width: 100%;
        height: 2px;
        background:  linear-gradient(90deg, transparent, #f0ad4e);
    }

    .btn-neon:hover #span1{
        left: 100%;
        transition: 1s;
    }

    #span3{
        bottom: 0;
        right: -100%;
        width: 100%;
        height: 2px;
        background:  linear-gradient(270deg, transparent, #f0ad4e);
    }

    .btn-neon:hover #span3{
        right: 100%;
        transition: 1s;
        transition-delay: 0.5s;
    }

    #span2{
        top: -100%;
        right: 0;
        width: 2px;
        height: 100%;
        background:  linear-gradient(180deg, transparent, #f0ad4e);
    }

    .btn-neon:hover #span2{
        top: 100%;
        transition: 1s;
        transition-delay: 0.25s;
    }

    #span4{
        bottom: -100%;
        left: 0;
        width: 2px;
        height: 100%;
        background:  linear-gradient(360deg, transparent, #f0ad4e);
    }

    .btn-neon:hover #span4{
        bottom: 100%;
        transition: 1s;
        transition-delay: 0.75s;
    }



    /* Circular */

    .button{
        position: relative;
        width: 180px;
        height: 180px;
        border-radius: 8em;
        color: #fff;
        text-decoration: none;
        border: none;
    }
    .button::after{
        content: "";
        display: block;
        position: absolute;
        border-radius: 8em;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: all 0.5s;
        box-shadow: 0 0 10px 40px #a945c7;
    }

    .button:active:after{
        box-shadow: 0 0 0 0 #a945c7;
        position: absolute;
        border-radius: 8em;
        left: 0;
        top: 0;
        opacity: 1;
        transition: 0s;
    }

    .button i{
        font-size: 100px;
    }
</style>
