@extends('layout.home.home')
@section('content')
    <div class="container">
        <div class="head text-center p25t">
            <form action="" id="form-data-role-email">
                <div class="form-group div-block-register-broker">
                    <div class="title-role">{{ trans('attributes.main_register.card_leader.title') }}</div>
                </div>
            </form>
            <h1 class="title-register">Chỉnh sửa thông tin của đội tình nguyện</h1>
        </div>
        <div class="card card-register mx-auto mt-5 wp70">
            <form id="info-teams">
                <div class="card-header card-info-team">Thông tin đội tình nguyện</div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-4 m5b">
                                    <div id="image-avatar-team" class="avatar essential-icon-img pointer">
                                        <img src="{{ asset('images/icon-img.png') }}">
                                    </div>
                                </div>
                                <input id="input-avatar-team" type="file" name="avatar_team" class="d-none">
                                <div class="col-sm-8">
                                    <p class="fs16 fw-bold m5b">Chọn tệp để tải lên</p>
                                    <p class="m5b d-none d-sm-block">
                                        Bạn có thể tải lên hình ảnh bằng cách kéo và thả
                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-4 col-form-label">Tên đội tình nguyện <span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-profile" name="name" placeholder="CLB Ngày mai tươi sáng">
                                    <p class="error-message" data-error="name"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Khoa viện <span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-profile" name="faculties" placeholder="IT1">
                                    <p class="error-message" data-error="faculties"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-4 col-form-label">Lịch sử thành lập <span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <textarea type="text" rows="8" class="form-control input-profile history-team" name="history"></textarea>
                                    <p class="error-message" data-error="history"></p>
                                </div>
                            </div>
                            <div class="form-grooup row">
                                <label class="col-sm-4 col-form-label">Ảnh tiêu biểu</label>
                                <div class="col-sm-8">
                                    <div class="row m0">
                                        <div class="col-4 p0l">
                                            <div id="photo-1" class="block-img essential-icon-img pointer">
                                                <button class="cancel-image input-hidden"><i class="material-icons">clear</i></button>
                                                <div class="">
                                                    <img class="default_plus_icon" src="{{asset('images/icon-plus.png')}}">
                                                </div>
                                            </div>
                                            <p class="error-message m0" data-error="photo-1"></p>
                                        </div>
                                        <div class="col-4 p7dot5l p7dot5r">
                                            <div id="photo-2" class="block-img essential-icon-img pointer">
                                                <button class="cancel-image input-hidden"><i class="material-icons">clear</i></button>
                                                <div class="">
                                                    <img class="default_plus_icon" src="{{asset('images/icon-plus.png')}}">
                                                </div>
                                            </div>
                                            <p class="error-message m0" data-error="photo-2"></p>
                                        </div>
                                        <div class="col-4 p0r">
                                            <div id="photo-3" class="block-img essential-icon-img pointer">
                                                <button class="cancel-image input-hidden"><i class="material-icons">clear</i></button>
                                                <div class="">
                                                    <img class="default_plus_icon" src="{{asset('images/icon-plus.png')}}">
                                                </div>
                                            </div>
                                            <p class="error-message m0" data-error="photo-3"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row m10t">
                                <label  class="col-sm-4 col-form-label">Giới thiệu</label>
                                <div class="col-sm-8">
                                    <textarea type="text" rows="8" class="form-control" name="introduction"></textarea>
                                    <p class="error-message" data-error="introduction"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center m70b">
            <button class="text-center btn border-0 btn-success btn-register-information btn-edit-team">{{ trans('attributes.register.step4.button_registration_screen') }}</button>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/profile.js') }}"></script>
@endsection