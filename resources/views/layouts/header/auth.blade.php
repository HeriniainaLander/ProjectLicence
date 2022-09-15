<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list d-none d-md-inline-block">
            <a href="#" id="btn-fullscreen" class="nav-link waves-effect waves-light">
                <i class="mdi mdi-crop-free noti-icon"></i>
            </a>
        </li>


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('assets')}}/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
           


                <div class="dropdown-divider"></div>
                @if( Auth::user()->type   == 'Administrateur')
                    <a href="{{ route('register') }}" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Administration</a>
                @endif
                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-power-settings"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="#" class="logo text-center logo-dark">
                        <span class="logo-lg">
                            <img src="{{asset('assets')}}/images/logo-dark.png" alt="" height="16">
                            <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">M</span> -->
                            <img src="{{asset('assets')}}/images/logo-sm.png" alt="" height="25">
                        </span>
        </a>

        <a href="#" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="{{asset('assets')}}/images/Logo-rofia.jpg" alt="" height="66" width="240">
                            <!-- <span class="logo-lg-text-dark">Moltran</span> -->
                        </span>
            <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">M</span> -->
                            <img src="{{asset('assets')}}/images/Logo-rofia.jpg" alt="" height="65" width="67.5">
                        </span>
        </a>
    </div>

    <!-- LOGO -->


    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="mdi mdi-menu"></i>
            </button>
        </li>
    </ul>
</div>
<!-- end Topbar -->
