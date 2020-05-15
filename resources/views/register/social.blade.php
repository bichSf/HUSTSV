@extends('layout.base.base')
@section('content')
    <div class="container">
        <h1 class="text-center m70t">Đăng ký</h1>
        <div class="text-right m25t m30r m30b">
            <span class="">Bạn đã có tài khoản?</span>
            <a class="color-green" href="{{ route(LOGIN_INDEX) }}">Đăng nhập</a>
        </div>
        <div>
            <form action="{{ route(REGISTER_SHOW_SCREEN_NORMAL_STEP_2) }}" method="post" id="form-register">
                @csrf
                <input type="hidden" name="role" value="{{ USER }}">
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-register">{{__('attributes.register.email')}} <span
                                class="text-red">*</span></label>
                </div>
                <div class="row m0 m10t">
                    <input type="email" class="offset-4 col-5 form-control input-register fs14-sp" name="email"
                           id="email-register" placeholder="Email">
                    <span class="offset-4 col-5 p0l text-red span-error-register" id="error-register-email"></span>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-register">{{__('attributes.register.password')}}
                        <span class="text-red">*</span> {{__('attributes.register.step1.explain_password')}}
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-register fs14-sp" name="password"
                           id="password-register" placeholder="Password">
                    <span class="offset-4 col-5 p0l text-red span-error-register" id="error-register-password"></span>
                </div>
                <div class="offset-4 col-5 form-check m10t">
                    <input type="checkbox" class="form-check-input pointer" id="checkbox-show-pass">
                    <label class="form-check-label pointer fs14-sp"
                           id="label-show-pass">{{__('attributes.register.step1.label_checkbox_pwd')}}</label>
                </div>
                <div class="text-center">
                    <button class="btn border-0 btn-success p10t p10b m30t m30b btn-register-info-normal btn-register-social">
                        Đăng ký
                    </button>
                </div>
            </form>
        </div>
        <div class="text-center m10t form-register-normal">
            <span class="fw-bold">HOẶC</span>
            <div class="m10t m70b">
                <a href="{{ route(LOGIN_USE_FACEBOOK) }}">
                    <button class="btn-register-social btn btn-primary">
                        <img class="w40 h40" src="{{ asset('images/social_network/facebook_logo.ico') }}" alt="">
                        <span class="m15l m10t">Facebook</span>
                    </button>
                </a>
                <a class="m20l" href="{{ route(LOGIN_USE_FACEBOOK) }}">
                    <button class="btn-register-social btn btn-primary">
                        <img class="w40 h40" src="{{ asset('images/social_network/google_plus.png') }}" alt="">
                        <span class="m15l m10t">Google</span>
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/register_main.js') }}"></script>
@endsection