@extends('layout.base.register')
@section('style-step')
    <link rel="stylesheet" href="{{ asset('css/register/step1.css') }}">
@endsection
@section('head-text')
    <div class="fw-bold">{{__('attributes.register.title_step1')}}</div>
@endsection
@section('content-step')
    <div class="row">
        <div class="form-process col-sm-12 col-lg-6">
            <div id="process-step1" class="process-content active">
                <form action="{{ route(REGISTER_SET_DATA_SCREEN_STEP_2) }}" method="post" id="form-register">
                    @csrf
                    <input type="hidden" name="role" value="{{ LEADER }}">
                    <div class="form-group">
                        <label class="fs12-sp" for="email-register">{{__('attributes.register.email')}}  <span class="text-red">*</span></label>
                        <input type="email" class="form-control input-register fs14-sp" name="email" id="email-register" placeholder="Email"
                               value="@if(session()->exists('data_register')) {{ session()->get('data_register')['email'] }}@endif">
                        <span class="text-red span-error-register" id="error-register-email"></span>
                    </div>
                    <div class="form-group">
                        <label class="fs12-sp" for="password-register">{{__('attributes.register.password')}}
                            <span class="text-red">*</span> {{__('attributes.register.step1.explain_password')}}
                        </label>
                        <input type="password" class="form-control input-register fs14-sp" name="password" id="password-register" placeholder="Password"
                               value="@if(session()->exists('data_register')) {{ session()->get('data_register')['password'] }}@endif">
                        <span class="text-red span-error-register" id="error-register-password"></span>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input pointer" id="checkbox-show-pass">
                        <label class="form-check-label pointer fs14-sp" id="label-show-pass">{{__('attributes.register.step1.label_checkbox_pwd')}}</label>
                    </div>
                    <div class="margin-auto text-center">
                        <button type="button" class="btn border-0 btn-success btn-submit btn-submit-register fs16-sp" >{{__('attributes.main_register.btn_register')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
