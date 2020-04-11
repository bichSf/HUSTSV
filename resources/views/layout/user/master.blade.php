<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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
    @yield('style')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</head>

<body class="courses-page">
@include('layout.user.header')
<div class="nav-bar">
    <div id="wrapper">
{{--            <div class="col-9 col-lg-3">--}}
{{--                <div class="site-branding">--}}
{{--                    <h1 class="site-title">--}}
{{--                        <a rel="home">{{ trans('attribute.common.full_name') }} <span>{{ trans('attribute.common.school') }}</span></a>--}}
{{--                    </h1>--}}
{{--                </div>--}}
{{--            </div>--}}
        @yield('content')
    </div>
</div>
@include('layout.user.footer')
</body>
</html>
