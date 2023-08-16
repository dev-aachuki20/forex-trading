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
                <!-- <img src="{{asset('png/logo-light.png')}}" alt="" height="17"> -->
                <h4 class="text-white pt-4">{{ str_replace('-',' ',env('APP_NAME')) }}</h4>
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

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/dashboard') ? 'active' : ''}}" href="{{route('auth.admin.dashboard')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboards</span>
                    </a>
                </li>
                @can('language_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ (request()->is('admin/language') || request()->is('admin/localization') ) ? 'collapsed active' :''}}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Language</span>
                    </a>
                    <div class="collapse menu-dropdown {{ (request()->is('admin/language') || request()->is('admin/localization') ) ? 'show' :''}}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('auth.language')}}" class="nav-link {{ request()->is('admin/language') ? 'active' : ''}}" data-key="t-calendar"> List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('auth.localization')}}" class="nav-link {{ request()->is('admin/localization') ? 'active' : ''}}" data-key="t-chat"> Localization </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                @can('faq_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/faq') ? 'active' : ''}}" href="{{route('auth.faq')}}">
                        <i class="ri-question-line"></i> <span data-key="t-widgets">FAQs</span>
                    </a>
                </li>
                @endcan

                @can('gallery_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/gallery') ? 'active' : ''}}" href="{{route('auth.gallery')}}">
                        <i class="ri-image-line"></i> <span data-key="t-widgets">Gallery </span>
                    </a>
                </li>
                @endcan

                @can('testimonial_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/testimonial') ? 'active' : ''}}" href="{{route('auth.testimonial')}}">
                        <i class="ri-user-line"></i> <span data-key="t-widgets">Testimonial</span>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/page-manage') ? 'active' : ''}}" href="{{route('auth.page')}}">
                        <i class="ri-article-line"></i> <span data-key="t-widgets">Page Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('auth.blog')}}">
                        <i class="ri-pencil-line"></i> <span data-key="t-widgets">Blog Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('auth.partner-logo')}}">
                        <i class="ri-gallery-fill"></i> <span data-key="t-widgets">Partner Logo</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('auth.package')}}">
                        <i class="ri-money-dollar-circle-fill"></i> <span data-key="t-widgets">Package Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('auth.news')}}">
                    <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">News Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('auth.team')}}">
                    <i class="ri-group-line"></i> <span data-key="t-widgets">Team Management</span>
                    </a>
                </li>










            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>