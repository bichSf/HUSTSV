@extends('layout.base.register')
@section('style-step')
    <link rel="stylesheet" href="{{ asset('css/register/step4.css') }}">
@endsection
@section('head-text')
    <div class="fw-bold">{{ trans('attributes.register.title_step4') }}</div>
@endsection
@section('content-step')
    <div class="register-step-4">
        @php($step4Status = session()->get('step4_status'))
        @if($step4Status == ACTIVE_SUCCESS)
            <h5 class="text-center">{{ trans('attributes.register.title_step4') }}</h5>
        @elseif($step4Status == ACTIVE_ERROR_USER_ACHIEVED)
            <h5 class="text-center">{{ trans('attributes.register.messages.authentication_done') }}</h5>
        @endif
        <div class="progress-register">
            <div class="row form-group div-block">
                <div class="text-center col-12">
                    <div class="step4-progress-registration fs16">
                        {{ trans('attributes.register.step4.display_progress_registration') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center step4-using-service fs14-sp">{{ trans('attributes.register.step4.using_service') }}</div>
        <div class="text-center">
            <a href="{{ route(PROFILE_TEAM_CREATE) }}">
                <button class="text-center btn border-0 btn-success m70t m70b btn-register-information">{{ trans('attributes.register.step4.button_registration_screen') }}</button>
            </a>
        </div>
    </div>
@endsection
