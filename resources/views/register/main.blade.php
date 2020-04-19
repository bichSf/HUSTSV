@extends('layout.base.base')
@section('content')
    <div class="main-header text-center">
        <h1 class="text-header fw-bold m15l m70t">{{ trans('attributes.main_register.title') }}</h1>
    </div>

    <div class="container">
        <div class="main-text-header text-center m10t fs14">
            <p class="main-summary fs16">{{ trans('attributes.main_register.summary_1') }}</p>
            <p class="main-summary fs16">{{ trans('attributes.main_register.summary_2') }}</p>
        </div>
        <div class="row justify-content-center p100b content-main-register m0">
            <div class="col-12 col-md-8 col-lg-4 p25r m10b-per">
                <div class="card card-item m0b">
                    <div class="card_user card-header card-item-header text-center">
                        <span class="fs17">{{ trans('attributes.main_register.card_user.title') }}</span>
                    </div>
                    <div class="card-body card-item-body">
                        <div class="row">
                            <i class="fa fa-stop font_awesome-stop col-1"></i>
                            <p class="col-10 fs14 p10l">{{ trans('attributes.main_register.card_user.description_1') }}</p>
                        </div>
                        <div class="row">
                            <i class="fa fa-stop font_awesome-stop col-1"></i>
                            <p class="col-10 fs14 p10l">{{ trans('attributes.main_register.card_user.description_2') }}</p>
                        </div>
                        <div class="row">
                            <i class="fa fa-stop font_awesome-stop col-1"></i>
                            <p class="col-10 fs14 p10l">{{ trans('attributes.main_register.card_user.description_3') }}</p>
                        </div>
                    </div>
                    <div class="card-footer card-item-footer text-center border-bottom-radius border-0 p0t">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="role" value="">
                            <button class="btn border-0 btn-success btn-send">
                                <span class="fs16">{{ trans('attributes.main_register.btn_register') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-4 p25l m10b-per">
                <div class="card card-item m0b">
                    <div class="card-leader card-header card-item-header text-center">
                        <span class="fs17">{{ trans('attributes.main_register.card_leader.title') }}</span>
                    </div>
                    <div class="card-body card-item-body">
                        <div class="row">
                            <i class="fa fa-stop font_awesome-stop col-1"></i>
                            <p class="col-10 fs14 p10l">{{ trans('attributes.main_register.card_leader.description_1') }}</p>
                        </div>
                        <div class="row">
                            <i class="fa fa-stop font_awesome-stop col-1"></i>
                            <p class="col-10 fs14 p10l">{{ trans('attributes.main_register.card_leader.description_2') }}</p>
                        </div>
                    </div>
                    <div class="card-footer card-item-footer text-center border-bottom-radius border-0 p0t">
                        <form action="{{ route(REGISTER_SET_DATA_SCREEN_STEP_1) }}" method="post">
                            @csrf
                            <input type="hidden" name="role" value=" {{ LEADER }}">
                            <button class="btn border-0 btn-success btn-send">
                                <span class="fs16">{{ trans('attributes.main_register.btn_register') }}</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
