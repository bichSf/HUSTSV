@extends('layout.user.master')
@section('content')
    <div class="row m0 p25b">
        <div class="hero-content-overlay">
            <div class="row">
                <div class="col-12">
                    <div class="hero-content-wrap flex flex-column justify-content-center align-items-start p0">
                        <header class="entry-header m50l m30l-sp">
                            <h4 class="color-green">Cùng khám phá</h4>
                            <span class="color-cyan fw-bold fs43">TÌNH NGUYỆN CÓ GÌ VUI?</span>
                        </header>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m0">
        <div class="container">
            @yield('content-view')
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/top.js') }}"></script>
@endsection