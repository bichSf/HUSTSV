@extends('layout.base.base')
@section('content')
    <div class="container">
        <div class="head text-center m30t">
            <h1 class="title-register">Thông tin cá nhân</h1>
        </div>
        <div class="card card-register mx-auto mt-5 wp70">
            <form id="info-leader">
                <input id="form-data-step4-role" type="hidden" name="role" value="{{ USER}}">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-sm-4 m5b">
                                    <div id="image-avatar-leader" class="avatar essential-icon-img pointer">
                                        <img src="{{ asset('images/icon-img.png') }}">
                                    </div>
                                </div>
                                <input id="input-avatar-leader" type="file" name="avatar_leader" class="d-none">
                                <div class="col-sm-8">
                                    <p class="fs16 fw-bold m5b">Chọn tệp để tải lên</p>
                                    <p class="m5b d-none d-sm-block">
                                        Bạn có thể tải lên hình ảnh bằng cách kéo và thả
                                    </p>
                                </div>
                                <p class="error-message" data-error="avatar"></p>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Họ tên <span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-profile" name="name" placeholder="Trần Thị Bích">
                                    <p class="error-message" data-error="name"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Ngày sinh</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-profile" name="date_of_birth" placeholder="1998/03/30">
                                    <p class="error-message" data-error="date_of_birth"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-4 col-form-label">Email <span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control input-profile" name="email" placeholder="Email">
                                    <p class="error-message" data-error="email"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">MSSV <span class="text-red">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control input-profile" name="mssv" placeholder="20165798">
                                    <p class="error-message" data-error="mssv"></p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Khoa viện <span class="text-red">*</span></label>
                                <div class="col-sm-4 p0r">
                                    <input type="text" class="form-control input-profile" name="faculties" placeholder="IT1">
                                    <p class="error-message faculties"></p>
                                </div>
                                <label  class="col-sm-2 col-form-label">Tên lớp <span class="text-red">*</span></label>
                                <div class="col-sm-2 p0l">
                                    <input type="text" class="form-control input-profile" name="class" placeholder="1">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Giới tính <span class="text-red">*</span></label>
                                <div class="col-md-4">
                                    <label class="container-input p30l">
                                        <input type="radio" class="input-profile" name="gender" value="0" checked>
                                        <span class="checkmark-radio"></span>Nam
                                    </label>
                                </div>
                                <div class="col-md-4">
                                    <label class="container-input p30l">
                                        <input type="radio" class="input-profile" name="gender" value="1">
                                        <span class="checkmark-radio"></span>Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center m70b">
            <button class="text-center btn border-0 btn-success btn-register-information btn-create-profile">{{ trans('attributes.register.step4.button_registration_screen') }}</button>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/custom/profile.js') }}"></script>
@endsection