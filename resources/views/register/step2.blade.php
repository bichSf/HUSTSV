@extends('layout.base.register')
@section('style-step')
    <link rel="stylesheet" href="{{ asset('css/register/step2.css') }}">
@endsection
@section('head-text')
    <div class="fw-bold">{{__('attributes.register.title_step2')}}</div>
@endsection
@section('content-step')
    <div class="row">
        <div class="form-process col-sm-12 col-lg-6">
            <div id="process-step2" class="process-content">
                <div class="content-step-2">
                    <div>
                        <p class="fs14 label-input-step2">{{__('attributes.register.email')}}</p>
                        <p class="fs14">{{ session()->get('data_register')['email'] }}</p>
                    </div>
                    <div>
                        <p class="fs14 label-input-step2">{{__('attributes.register.password')}}</p>
                        <p class="fs14">{{ str_pad('', strlen(session()->get('data_register')['password']), '*', STR_PAD_LEFT) }}</p>
                    </div>
                </div>
                <div class="margin-auto text-center">
                    <form id="form-data-step2" action="{{ route(REGISTER_SEND_MAIL) }}" method="POST">
                        @csrf
                        <button id="btn-register-confirm" type="submit" class="btn border-0 btn-success btn-submit btn-confirm-step2">{{__('attributes.main_register.btn_register')}}</button>
                    </form>
                    <a href="{{ route(REGISTER_SHOW_SCREEN_1) }}" class="btn m20t fs14 border-0">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>{{__('attributes.register.step2.btn_back')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
