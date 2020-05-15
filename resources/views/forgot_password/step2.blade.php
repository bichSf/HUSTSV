@extends('layout.base.base')
@section('content')
    <div class="container">
        <h1 class="text-center m70t">Quên mật khẩu</h1>
        <div class="forgot-pw-step3">
            <form id="reset-password">
                @csrf
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-register">{{__('attributes.register.password')}}
                        <span class="text-red">*</span> {{__('attributes.register.step1.explain_password')}}
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-register fs14-sp" name="password"
                           id="password-register" placeholder="Password">
                    <p class="offset-4 col-5 p0l error-message" data-error="password"></p>
                </div>
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t" for="email-register">{{__('attributes.register.password')}} confirm
                        <span class="text-red">*</span>
                    </label>
                </div>
                <div class="row m0 m10t">
                    <input type="password" class="offset-4 col-5 form-control input-register fs14-sp" name="password_confirm"
                           id="password-register" placeholder="Password confirm">
                    <p class="offset-4 col-5 p0l error-message" data-error="password_confirm"></p>
                </div>
                <input type="hidden" name="token" value="{{ request()->token }}">
            </form>
            <div class="text-center">
                <button class="btn border-0 btn-success p10t p10b m30t m30b btn-reset-password btn-register-social">
                    Lấy lại mật khẩu
                </button>
            </div>
        </div>

        <div class="forgot-pw-step4" style="display: none">
            <div class="receive-email head-process">
                <div class="message-receive-email text-center">
                    <span class="fs13-sp">Bạn đã thay đổi mật khẩu thành công</span>
                    <br>
                    <span class="fs13-sp">Cảm ơn bạn đã sử dụng hệ thống</span>
                </div>
            </div>
            <div class="text-center m70t">
                <button class="btn border-0 btn-success p10t p10b m30t m30b btn-register-info-normal btn-register-social">
                    <a href="{{ route(USER_TOP) }}" class="text-white un-underline">Đi đến Trang chủ</a>
                </button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/forgot_password.js') }}"></script>
@endsection