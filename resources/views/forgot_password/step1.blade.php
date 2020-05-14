@extends('layout.base.base')
@section('content')
    <div class="container">
        <h1 class="text-center m70t">Quên mật khẩu</h1>
        <div class="forgot-pw-step1">
            <form id="email-reset">
                @csrf
                <div class="row m0 m10t">
                    <label class="offset-4 fs12-sp m5t">{{__('attributes.register.email')}} <span
                                class="text-red">*</span></label>
                </div>
                <div class="row m0 m10t">
                    <input type="email" class="offset-4 col-5 form-control input-reset fs14-sp" name="email"
                           id="email-forgot" placeholder="Email">
                    <p class="offset-4 col-5 p0l error-message" data-error="email"></p>
                </div>
            </form>
            <div class="text-center">
                <button class="btn border-0 btn-success p10t p10b m30t m30b btn-register-social" id="submit-gmail-forgot-pass">
                    Lấy lại mật khẩu
                </button>
            </div>
        </div>

        <div class="forgot-pw-step2" style="display: none">
{{--            <form id="register-normal">--}}
{{--                @csrf--}}
{{--                <div class="row m0 m10t">--}}
{{--                    <label class="offset-4 fs12-sp m5t" for="email-register">{{__('attributes.register.password')}}--}}
{{--                        <span class="text-red">*</span> {{__('attributes.register.step1.explain_password')}}--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="row m0 m10t">--}}
{{--                    <input type="password" class="offset-4 col-5 form-control input-register fs14-sp" name="password"--}}
{{--                           id="password-register" placeholder="Password">--}}
{{--                    <span class="offset-4 col-5 p0l text-red span-error-register" id="error-register-password"></span>--}}
{{--                </div>--}}
{{--                <div class="row m0 m10t">--}}
{{--                    <label class="offset-4 fs12-sp m5t" for="email-register">{{__('attributes.register.password')}} confirm--}}
{{--                        <span class="text-red">*</span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="row m0 m10t">--}}
{{--                    <input type="password" class="offset-4 col-5 form-control input-register fs14-sp" name="password"--}}
{{--                           id="password-register" placeholder="Password confirm">--}}
{{--                    <span class="offset-4 col-5 p0l text-red span-error-register" id="error-register-password"></span>--}}
{{--                </div>--}}
{{--            </form>--}}
            <div class="text-center">
                <button class="btn border-0 btn-success p10t p10b m30t m30b btn-register-info-normal btn-register-social">
                    Lấy lại mật khẩu
                </button>
            </div>
        </div>
    </div>
    <div class="receive-email head-process m70t">
        <hr>
        <div class="title-receive-email">{{ trans('attributes.register.footer.title') }}</div>
        <div class="message-receive-email text-justify ">
            <span class="fs13-sp">{{ trans('attributes.register.footer.des_1') }}</span>
            <br>
            <span class="fs13-sp">{{ trans('attributes.register.footer.des_2') }}</span>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/forgot_password.js') }}"></script>
@endsection