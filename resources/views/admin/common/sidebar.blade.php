<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
           aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('admin/assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">TruyenPro</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="load-dashboard" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-gradient-primary' : '' }}" href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a id="load-genre" class="nav-link text-white {{ request()->routeIs('genre.index') ? 'active bg-gradient-primary' : '' }}" href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý thể loại</span>
                </a>
            </li>
            <li class="nav-item">
                <a id="load-story" class="nav-link text-white {{ request()->routeIs('story.index') ? 'active bg-gradient-primary' : '' }}" href="{{ route('story.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý truyện</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/virtual-reality.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/rtl.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/notifications.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account
                    pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/profile.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/sign-in.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/sign-up.html">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                @csrf
            </form>
            <a class="btn bg-gradient-primary w-100" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="nav-link-text ms-1">Đăng xuất</span>
            </a>
        </div>
    </div>
</aside>
