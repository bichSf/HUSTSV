<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <title>{{ trans('attributes.common.name_abbreviations') }}</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/interfaceUser.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/datepicker.standalone.min.css') }}">

    @yield('styles')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.ja.min.js') }}"></script>
    <script src="{{ asset('js/custom/common.js') }}"></script>
    @yield('script-files')
</head>
@include('layout.base.header')
<body>
<div id="wrapper" class="h85vh">
    @yield('content')
</div>
</body>
@include('layout.base.footer')
@yield('js')
</html>
