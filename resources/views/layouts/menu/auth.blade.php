<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="user-box">

                <div class="float-left">
                    <img src="{{asset('assets')}}/images/users/avatar-1.jpg" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">

                            @if( Auth::user()->type   == 'Administrateur')
                                <li><a href="{{ route('register') }}" class="dropdown-item"><i class="mdi mdi-settings mr-2"></i> Administration</a></li>
                            @endif
                            
                        </ul>
                    </div>
                    <p class="font-13 text-muted m-0">{{ Auth::user()->type }}</p>
                </div>
            </div>

            <ul class="metismenu" id="side-menu">

                <li>
                    <a href="{{ route('home')}}" class="waves-effect">
                        <i class="mdi mdi-home-outline"></i>
                        <span> Accueil </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Clients </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('clients.create') }}">Création</a></li>
                        <li><a href="{{ route('clients.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span> Offres </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('offres.create') }}">Création</a></li>
                        <li><a href="{{ route('offres.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-router-wireless"></i>
                        <span> Diffusion </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('diffusions.create') }}">Création</a></li>
                        <li><a href="{{ route('diffusions.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Commandes </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('commandes.create') }}">Création</a></li>
                        <li><a href="{{ route('commandes.index') }}">Liste</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-scale-balance"></i>
                        <span> Evaluations </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('evaluation.date') }}">Par date</a></li>
                    </ul>
                </li>
<br><br><br><br><br><br><br><br>
                
        <li>
            
            <a href="{{ route('logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-power-settings"></i>
                    <span>Déconnexion</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

        </li>
            </ul>


        </div>
     

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->


</div>
<!-- Left Sidebar End -->
