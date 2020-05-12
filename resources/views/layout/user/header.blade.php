<div class="d-none d-sm-block">
    <div class="page-header">
        <header class="site-header">
            <div class="top-header-bar">
                <div class="container-fluid p0 m0">
                    <div class="row m0">
                        <div class="col-sm-4 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0 p0">
                            <div id="banner-left" class="m10 m30l">
                                <a id="logo" href="https://www.hust.edu.vn/web/vi/home" title="{{ trans('attributes.index.title_logo') }}">
                                    <img src="{{ asset('images/logoEn.png') }}" alt="{{ trans('attributes.common.name_abbreviations') }}"/>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-8 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center p0 p30r">
                            <div class="row m0">
                                <div class="col-8 p0">
                                    <div class="header-bar-search">
                                        <form action="search.php" method="get" class="flex align-items-stretch">
                                            <input name="search" type="search" placeholder="{{ trans('attributes.index.search') }}">
                                            <button type="button" name="search" class="flex justify-content-center align-items-center bg-red pointer w40">
                                                <i class="fa fa-search text-white"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-4 p0">
                                    <div class="header-bar-menu">
                                        <div class="flex justify-content-center align-items-center p0 m30l">
                                            <button type="button" class="btn btn-light border-0 btn-register bg-white pointer fs14 fs13-sp">
                                                <a class="text-body" href="{{ route(REGISTER_SHOW_SCREEN_REGISTER) }}">{{ trans('attributes.index.register') }}</a>
                                            </button>
                                            <span>/</span>
                                            <button class="btn btn-light border-0 btn-login bg-white pointer fs14 fs13-sp" type="button">{{ trans('attributes.index.login') }}</button>
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
                <li id="menu-item-top"><a class="menu-item menu-item-active" href="{{ route(USER_HOME) }}">{{ trans('attributes.index.menu.home') }}</a></li>
                <li id="menu-item-team"><a class="menu-item" href="{{ route(USER_TEAM) }}">{{ trans('attributes.index.menu.volunteer_team') }}</a></li>
                <li id="menu-item-faculties"><a class="menu-item" href="{{ route(USER_FACULTIES) }}">{{ trans('attributes.index.menu.academy') }}</a></li>
                <li id="menu-item-contact"><a class="menu-item" href="{{ route(USER_CONTACT) }}">{{ trans('attributes.index.menu.contact') }}</a></li>
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

