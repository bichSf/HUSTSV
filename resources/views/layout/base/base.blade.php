<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <title>{{ trans('attribute.common.name_abbreviations') }}</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/interfaceUser.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}"/>
    @yield('styles')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/6.6.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.6.0/firebase-auth.js"></script>
    @yield('script-files')
</head>
@include('layout/base/header')
<body>
<div id="wrapper">
    @yield('content')
</div>
</body>
@include('layout/base/footer')
@yield('js')
</html>
