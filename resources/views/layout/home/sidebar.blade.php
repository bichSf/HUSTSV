<aside class="main-sidebar-left sidebar-dark-primary while-color overflow-auto">
    <nav>
        <ul class="nav nav-pills nav-sidebar flex-column nav-menu" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item menu-simulation-item">
                <div class="input-group-append form-search txt-black nl-one-item" style="display: none">
                    <i class="fa fa-search font_awesome-search centered-vertical text-body m10lfs16 pointer"></i>
                    <input class="form-control input-search border-0 fs14 m4t" type="search"
                           placeholder= 'Search'>
                </div>
            </li>
            <li class="nav-item menu-simulation-item">
                <a href="{{ route(USER_HOME) }}" class="nav-link nav-link-item nl-one-item active-one-item" data-id="home">
                    <i class="fa fa-home fa-1p5x" aria-hidden="true"></i>
                    <span class="text-body m10l">Trang chủ</span>
                </a>
            </li>
            <li class="nav-item menu-simulation-item">
                <a href="" class="nav-link nav-link-item nl-one-item nl-simulation" >
                    <i class="fa fa-user fa-1p5x" aria-hidden="true"></i>
                    <span class="text-body m10l">Thông tin cá nhân</span>
                </a>
            </li>
            <li class="nav-item menu-simulation-item">
                <a href="{{ route(PROFILE_TEAM_EDIT, 2) }}" class="nav-link nav-link-item nl-one-item nl-simulation" >
                    <i class="fa fa-user fa-1p5x" aria-hidden="true"></i>
                    <span class="text-body m10l">Thông tin đội</span>
                </a>
            </li>
            <li class="nav-item menu-simulation-item">
                <a href="" class="nav-link nav-link-item nl-one-item nl-simulation" >
                    <i class="fa fa-list-ul fa-1p5x" aria-hidden="true"></i>
                    <span class="text-body m10l">Quản lý trang đội</span>
                </a>
            </li>
            <li class="nav-item menu-simulation-item">
                <a href="" class="nav-link nav-link-item nl-one-item nl-simulation" >
                    <i class="fa fa-cog fa-1p5x" aria-hidden="true"></i>
                    <span class="text-body m10l">Cài đặt</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>