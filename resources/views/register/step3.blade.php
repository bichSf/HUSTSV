@extends('layout.base.register')
@section('style-step')
    <link rel="stylesheet" href="{{ asset('css/register/step3.css') }}">
@endsection
@section('head-text')
    <div class="fw-bold">{{__('attributes.register.title_step3')}}</div>
@endsection
@section('content-step')
    @if(session()->exists('step4_status'))
        <div class="row">
            <div class="form-process col-sm-12 col-lg-8">
                <div class="row process-content active text-center">
                    @php($step4Status = session()->get('step4_status'))
                    @if($step4Status == ACTIVE_FAIL || $step4Status == ACTIVE_ERROR_EXPIRY_TIME)
                        <h5 class="text-red text-center fs20">{{ trans('attributes.register.messages.active_fail_1') }}</h5>
                        <h5 class="text-red text-center fs20">{{ trans('attributes.register.messages.active_fail_2') }}</h5>
                    @endif
                    <div class="form-group div-block">
                        <div>{{ session()->get('data_register')['email'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="form-process col-sm-12 col-lg-8">
                <div class="row process-content active text-center">
                    @php($step3Status = session()->get('step3_status'))
                    @if(in_array($step3Status, [EMAIL_SENT,  EMAIL_SEND_SUCCESS]))
                        <h5 class="text-red text-center fs20">{{ trans('attributes.register.messages.verified_mail') }}</h5>
                    @endif
                    @if($step3Status == EMAIL_SEND_FAIL)
                        <h5 class="text-red text-center fs20">{{ trans('attributes.register.messages.send_fail') }}</h5>
                    @endif
                    @if($step3Status == EMAIL_USER_VERIFIED)
                        <h5 class="text-red text-center fs20">{{ trans('attributes.register.messages.authentication_done') }}</h5>
                    @endif
                    <div class="content-auth-email w-95-sp">
                        @if($step3Status == EMAIL_SEND_FAIL)
                            <span class="fs16-sp">{{ trans('attributes.register.messages.active_fail_1') }}</span>
                            <br>
                            <span class="fs16-sp">{{ trans('attributes.register.messages.active_fail_2') }}</span>
                        @else
                            <span class="fs16-sp">{{ trans('attributes.register.messages.authentication_1') }}</span>
                            <br>
                            <span class="fs16-sp">{{ trans('attributes.register.messages.authentication_2') }}</span>
                        @endif
                    </div>
                    <div class="form-group div-block w-95-sp pd-5-sp">
                        <div class="fs16-sp">{{ session()->get('data_register')['email'] }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="receive-email head-process w-100-sp">
        <hr>
        <div class="title-receive-email">{{ trans('attributes.register.footer.title') }}</div>
        <div class="message-receive-email text-justify ">
            <span class="fs13-sp">{{ trans('attributes.register.footer.des_1') }}</span>
            <br>
            <span class="fs13-sp">{{ trans('attributes.register.footer.des_2') }}</span>
        </div>
    </div>
@endsection
