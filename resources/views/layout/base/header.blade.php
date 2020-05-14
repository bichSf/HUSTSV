<header id="header" class="">
    <div class="text-center text-md-left">
        <div class="row justify-content-between">
            <div class="col-6 col-sm-3">
                <a href="{{ route(USER_TOP) }}">
                    <img src="{{ asset('images/logo/HUSTSV.png') }}" alt="" class="logo-header">
                </a>
            </div>
            @if(auth()->user())
                <div class="col-6 col-sm-9 p25r">
                <div class="header-simulation-right hp100">
                    <div class="message-dropdown-menu dropdown m12t">
                        <a class="nav-link nav-link-mess bg-general" data-toggle="dropdown" href="#">
                            <span data-title="Tin nhắn">
                                <i class="fa fa-comments fa-1p5x" aria-hidden="true"></i>
                            </span>
                            <span class="badge-home badge-danger">10</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right message-dropdown">
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="http://113.190.232.99:8076/images/user_default.png" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            Guest
                                            <span class="float-right text-sm text-danger"></span>
                                        </h3>
                                        <p class="text-sm">Call me whenever you can...</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </div>

                    <div class="noti-dropdown-menu dropdown m12t">
                        <a class="nav-link nav-link-noti bg-general" data-toggle="dropdown" href="#">
                            <span data-title="Thông báo">
                                <i class="fa fa-bell fa-1p5x" aria-hidden="true"></i>
                            </span>
                            <span class="badge-home badge-danger">10</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right noti-dropdown">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fa fa-envelope mr-2"></i> 10 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </div>

                    <nav class="navbar-expand-smk m10r">
                        <ul class="navbar-nav hp100">
                            <!-- Dropdown -->
                            <li class="nav-item dropdown hp100">
                                <a class="nav-link dropdown-toggle text-body lh45" href="#" id="navbardrop" data-toggle="dropdown">
                                    <img class="img-user w30 h30" src="http://113.190.232.99:8076/storage/imagesProfileUser/thumbnail_NxCZgItyac54AfFxzVv98rAGiHbAuIfIEO02vbve.jpeg">
                                    <span class="name-user text-center text-body m10l fw-bold">bich</span>
                                </a>
                                <div class="dropdown-menu drop-down-for-user" style="box-shadow: 0 0.5rem 1rem rgba(0,0,0,.175);">
                                    <a class="dropdown-item" href="{{ route(LOGOUT) }}">Đăng xuất</a>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <a class="header-simulation-left btn-bars display-center d-flex d-md-none d-lg-none" data-widget="pushmenu">
                        <i class="fa fa-bars-custom" id="fa-menu">
                            <img class="open-menu fa-bars-img fa-menu" src="http://113.190.232.99:8076/images/open_icon.png">
                            <img class="close-menu fa-close-img fa-menu" src="http://113.190.232.99:8076/images/close_icon.png" style="display: none">
                        </i>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </div>
</header>
