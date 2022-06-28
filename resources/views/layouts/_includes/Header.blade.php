<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/images/insignia/logo.png')}}">

    <title>@yield('titulo')</title>


    <!-- Favicons -->
  <link href="{{asset('/dashboard/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/dashboard/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('/dashboard/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('/dashboard/css/select2.css')}}">
  <!-- Template Main CSS File -->
  <link href="{{asset('/dashboard/css/style.css')}}" rel="stylesheet">
    {{-- sweet alert --}}
    <link rel="stylesheet" href="{{asset('/dashboard/css/sweetalert2.min.css')}}">
    <script src="{{asset('/dashboard/js/sweetalert2.all.min.js')}}"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
