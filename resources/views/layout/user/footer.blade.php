<footer class="site-footer bg-dark-gray">
    <div class="footer-widgets p20b p20t fs14 d-none d-sm-block">
        <div class="container">
            <div class="row m10b">
                <div class="col-12 col-md-4 col-lg-4 p0">
                    <div class="foot-about">
                        <div id="wrapper-title-left-left" class="map">
                            <h2 class="m10b color-gray">{{ trans('attributes.index.title_map') }}</h2>
                            <span>{{ trans('attributes.common.full_school') }}</span>
                            <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+B%C3%A1ch+khoa+H%C3%A0+N%E1%BB%99i/@21.0070516,105.840707,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ac76ccab6dd7:0x55e92a5b07a97d03!8m2!3d21.0070516!4d105.8428957">
                                <img class="w210 h80" src="{{asset('images/bk-hn.png')}}">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-4 mt-5 mt-md-0 p0">
                    <div class="foot-contact">
                        <h2 class="m10b color-gray">{{ trans('attributes.index.menu.contact') }}</h2>
                        <ul>
                            <li>Email: tranbichbk@gmail.com</li>
                            <li>Phone: 0869259906</li>
                            <li>Address: 7, Tạ Quang Bửu, Hai Bà Trưng, Hà Nội</li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 offset-md-1 col-md-3 col-lg-3 mt-5 mt-lg-0 p0">
                    <div class="follow-us">
                        <h2 class="m10b color-gray">{{ trans('attributes.index.social_network') }}</h2>
                        <ul class="follow-us flex flex-wrap align-items-center">
                            <li>
                                <a href="https://www.facebook.com/bich.tran.35110">
                                    <img class="w40 h40" src="{{asset('images/social_network/facebook_logo.ico')}}">
                                </a>
                            </li>
                            <li class="m15l">
                                <a href="https://www.pinterest.com/tranbichbk/">
                                    <img class="w40 h40" src="{{asset('images/social_network/pinteres-icon.ico')}}">
                                </a>
                            </li>
                            <li class="m15l">
                                <a href="https://www.instagram.com/tran.bich_sf/?hl=vi">
                                    <img class="w40 h40" src="{{asset('images/social_network/instagram_logo.ico')}}">
                                </a>
                            </li>
                            <li class="m15l">
                                <a href="https://chat.zalo.me/">
                                    <img class="w36 h33" src="{{asset('images/social_network/zalo-icon.ico')}}">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-center fs12">
                <span class="footer-copyright color-gray">
                    {{ trans('attributes.index.copyright') }} &copy;<script>document.write(new Date().getFullYear());</script>
                    {{ trans('attributes.index.copy_right') }} by <a class="color-gray" href="https://www.hust.edu.vn/web/vi/home">{{ trans('attributes.common.school') }}</a>
                </span>
            </div>
        </div>
    </div>

    <div class="footer-widgets p20b p20t fs14 d-block d-sm-none">
        <div class="row m10b">
        </div>
    </div>
</footer>
