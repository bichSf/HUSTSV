@extends('layout.base.base')
@section('styles')
    @yield('style-step')
@endsection
@section('content')
    <div class="container container-register">
        <div class="head">
            <form action="" id="form-data-role-email">
                @csrf
                <div class="form-group div-block-register-broker">
                    <div class="title-role">{{ trans('attributes.main_register.card_leader.title') }}</div>
                    <input id="form-data-step4-role" type="hidden" name="role" value="{{ LEADER }}">
                </div>
            </form>
            <h1 class="title-register">
                @yield('head-text')
            </h1>
        </div>
        <div>
            <div class="process">
                <div class="head-process">
                    <div class="head-process-contant">
                        <span id="title-step1" class="process-title">{{ trans('attributes.register.title_step1')}}</span>
                    </div>
                    <div class="head-process-contant">
                        <span id="title-step2" class="process-title">{{ trans('attributes.register.title_step2')}}</span>
                    </div>
                    <div class="head-process-contant">
                        <span id="title-step3" class="process-title">{{ trans('attributes.register.title_step3')}}</span>
                    </div>
                    <div class="head-process-contant">
                        <span id="title-step4" class="process-title">{{ trans('attributes.register.title_step4')}}</span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
            </div>
            @yield('content-step')
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/register_main.js') }}"></script>
@endsection