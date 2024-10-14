<!DOCTYPE html>
<html lang="fa" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
      data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="rtl">

<head>
    <script src = "https://code.jquery.com/jquery-3.6.0.min.js" > </script>

    <meta charset="utf-8">
    <title>{{ $title ?? '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Admin Panel" name="description">
    <meta content="Mohammad Asadi" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind2.css') }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">
    <!-- Layout config Js -->
    <script src="{{ asset('admin/assets/js/layout.js') }}"></script>
    @stack('styles')



</head>
