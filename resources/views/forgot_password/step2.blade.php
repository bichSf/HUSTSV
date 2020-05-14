@extends('layout.base.base')
@section('content')
    <div class="container">
        <h1 class="text-center m70t">Quên mật khẩu</h1>
        <div>
            <form id="register-normal">
                @csrf
                <div class="receive-email head-process">
                    <div class="message-receive-email text-center">
                        <span class="fs13-sp">Bạn đã thay đổi mật khẩu thành công</span>
                        <br>
                        <span class="fs13-sp">Cảm ơn bạn đã sử dụng hệ thống</span>
                    </div>
                </div>
                <div class="receive-email head-process">
                    <div class="message-receive-email text-center">
                        <span class="fs13-sp">Thay đổi mật khẩu thất bại</span>
                        <br>
                        <span class="fs13-sp">Vui lòng thử lại. Cảm ơn bạn đã sử dụng hệ thống</span>
                    </div>
                </div>
            </form>
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