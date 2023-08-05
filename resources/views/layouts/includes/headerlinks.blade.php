<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('ico/favicon.ico')}}">

    <!-- jsvectormap css -->
    <link href="{{ asset('css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('css/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{asset('css/filepond.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/filepond-plugin-image-preview.min.css')}}">
    <!-- new -->
    <!-- <link href="{{asset('css/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" /> -->

</head>

<body>