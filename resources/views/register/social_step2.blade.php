@extends('layout.base.base')
@section('content')
    <div class="container">
        <h1 class="text-center m70t">Đăng ký</h1>
        <div class="row process-content active text-center">
            <h5 class="text-red text-center fs20">{{ trans('attributes.register.messages.verified_mail') }}</h5>
            <div class="content-auth-email w-95-sp">
                <span class="fs16-sp">{{ trans('attributes.register.messages.authentication_1') }}</span>
                <br>
                <span class="fs16-sp">{{ trans('attributes.register.messages.authentication_2') }}</span>
            </div>
            <div class="form-group div-block w-95-sp pd-5-sp">
                <div class="fs16-sp">{{ session()->get('data_register')['email'] }}</div>
            </div>
        </div>
    </div>

    <div class="receive-email head-process">
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
    <script src="{{ asset('js/custom/register_main.js') }}"></script>
@endsection