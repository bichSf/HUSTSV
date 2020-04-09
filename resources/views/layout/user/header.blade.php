<div class="d-none d-sm-block">
    <div class="page-header">
        <header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid p0 m0">
                    <div class="row m0">
                        <div class="col-sm-4 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0 p0">
                            <div id="banner-left" class="m10 m30l">
                                <a id="logo" href="https://www.hust.edu.vn/web/vi/home" title="{{ trans('attribute.index.title_logo') }}">
                                    <img src="{{ asset('images/logoEn.png') }}" alt="{{ trans('attribute.common.name_abbreviations') }}"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center p0 p30r">
                            <div class="row m0">
                                <div class="col-8 p0">
                                    <div class="header-bar-search">
                                        <form action="search.php" method="get" class="flex align-items-stretch">
                                            <input name="search" type="search" placeholder="{{ trans('attribute.index.search') }}">
                                            <button type="button" name="search" class="flex justify-content-center align-items-center bg-red pointer w40">
                                                {{--                                    <i class="fa fa-search"></i>--}}
                                                {{--                                    <i class="fa-sort-icon fa fa-caret-down" aria-hidden="true"></i>--}}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-4 p0">
                                    <div class="header-bar-menu">
                                        <div class="flex justify-content-center align-items-center p0 m30l">
                                            <button type="button" class="btn btn-light border-0 btn-register bg-white pointer fs14 fs13-sp">
                                                <a href="{{ route(REGISTER_SHOW_SCREEN_REGISTER) }}">{{ trans('attribute.index.register') }}</a>
                                            </button>
                                            <span>/</span>
                                            <button class="btn btn-light border-0 btn-login bg-white pointer fs14 fs13-sp" type="button">{{ trans('attribute.index.login') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="col-3 col-lg-9 flex menu-bottom">
        <nav class="site-navigation flex">
            <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                <li id="menu-item-index"><a class="menu-item menu-item-active" href="index.blade.php">{{ trans('attribute.index.menu.home') }}</a></li>
                <li id="menu-item-team"><a class="menu-item" href="doiTN.php">{{ trans('attribute.index.menu.volunteer_team') }}</a></li>
                <li id="menu-item-school"><a class="menu-item" href="khoaVien.php">{{ trans('attribute.index.menu.academy') }}</a></li>
                <li id="menu-item-contact"><a class="menu-item" href="contact.php">{{ trans('attribute.index.menu.contact') }}</a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="d-block d-sm-none float-right">
    <i class="fa fa-bars" aria-hidden="true"></i>
</div>
{{--@include('user.modals.login_modal')--}}
{{--<script src="{{asset('js/firebase_config.js')}}"></script>--}}
{{--<script src="{{asset('js/login.js')}}"></script>--}}

