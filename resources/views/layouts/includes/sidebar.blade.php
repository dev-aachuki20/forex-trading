<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index-2.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('png/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('png/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index-2.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('png/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('png/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <!-- <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item  {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{route('auth.admin.dashboard')}}" class="nav-link" data-key="t-analytics"> <i class="ri-dashboard-2-line"></i> Dashboard </a>
                </li>
                
                @can('language_access')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/language') ? 'active' : '' }} menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                    <i class="ri-global-line"></i> <span data-key="t-dashboards">Language</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item  {{ request()->is('admin/language') ? 'active' : '' }}" >
                                <a href="{{route('auth.language')}}" class="nav-link" data-key="t-analytics"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('auth.localization')}}" class="nav-link" data-key="t-crm"> Localization </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan
                

            </ul> -->


            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('auth.admin.dashboard')}}" class="nav-link" data-key="t-analytics"> Main </a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                @can('language_access')
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Language</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('auth.language')}}" class="nav-link" data-key="t-calendar"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('auth.localization')}}" class="nav-link" data-key="t-chat"> Localization </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan









            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>