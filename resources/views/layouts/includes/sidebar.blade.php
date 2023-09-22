<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index-2.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/png/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/png/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('auth.admin.dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/png/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ getSetting('site_logo') ? getSetting('site_logo') : asset(config('constants.default.logo')) }}" alt="" height="80%" width="80%">
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
                    <a class="nav-link menu-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('auth.admin.dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['dashboard'] }}</span>
                    </a>
                </li>
                @can('language_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/language') || request()->is('admin/localization') ? 'collapsed active' : '' }}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">{{ $allKeysProvider['language'] }}</span>
                    </a>
                    <div class="collapse menu-dropdown {{ request()->is('admin/language') || request()->is('admin/localization') ? 'show' : '' }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('auth.language') }}" class="nav-link {{ request()->is('admin/language') ? 'active' : '' }}" data-key="t-calendar"> {{ $allKeysProvider['list'] }} </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.localization') }}" class="nav-link {{ request()->is('admin/localization') ? 'active' : '' }}" data-key="t-chat"> {{ $allKeysProvider['localization'] }} </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endcan

                @can('faq_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/faq') ? 'active' : '' }}" href="{{ route('auth.faq') }}">
                        <i class="ri-question-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['faq'] }}
                        </span>
                    </a>
                </li>
                @endcan

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/courses') ||  request()->is('admin/courses/content/*') ||  request()->is('admin/lectures/*') ? 'active' : '' }}" href="{{ route('auth.courses') }}">
                <i class="ri-question-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['courses'] }}
                </span>
                </a>
                </li> --}}

                @can('gallery_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/gallery') ? 'active' : '' }}" href="{{ route('auth.gallery') }}">
                        <i class="ri-image-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['gallery'] }}
                        </span>
                    </a>
                </li>
                @endcan

                @can('testimonial_access')
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/testimonial') ? 'active' : '' }}" href="{{ route('auth.testimonial') }}">
                        <i class="ri-user-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['testimonial'] }}
                        </span>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/page-manage') ? 'active' : '' }}" href="{{ route('auth.page') }}">
                        <i class="ri-article-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['page_management'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/blog-manage') ? 'active' : '' }}" href="{{ route('auth.blog') }}">
                        <i class="ri-pencil-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['blog_management'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->is('admin/partner-logos') ? 'active' : '' }}" href="{{ route('auth.partner-logo') }}">
                        <i class="ri-gallery-fill"></i> <span data-key="t-widgets">{{ $allKeysProvider['partner_logo'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/package-manage') ? 'active' : '' }}" href="{{ route('auth.package') }}">
                        <i class="ri-money-dollar-circle-fill"></i> <span data-key="t-widgets">{{ $allKeysProvider['package_management'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/news-manage') ? 'active' : '' }}" href="{{ route('auth.news') }}">
                        <i class="ri-file-list-3-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['news_management'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/team-manage') ? 'active' : '' }}" href="{{ route('auth.team') }}">
                        <i class="ri-group-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['team_management'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/include-manage') ? 'active' : '' }}" href="{{ route('auth.include') }}">
                        <i class="ri-shield-user-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['include_manager'] }} </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/glance') ? 'active' : '' }}" href="{{ route('auth.glance') }}">
                        <i class="ri-gallery-fill"></i> <span data-key="t-widgets">{{ $allKeysProvider['glance'] }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/featured-manage') ? 'active' : '' }}" href="{{ route('auth.featured') }}">
                        <i class="ri-folder-user-fill"></i> <span data-key="t-widgets">{{ $allKeysProvider['featured_manager'] }}</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/why-trade-with-us') ? 'active' : '' }}" href="{{ route('auth.whytrade') }}">
                <i class="ri-questionnaire-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['why_trade_with_us'] }}</span>
                </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/affiliate') ? 'active' : '' }}" href="{{ route('auth.affiliate') }}">
                        <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{ $allKeysProvider['affiliates'] }}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/resources') ? 'active' : '' }}" href="{{ route('auth.resources') }}">
                        <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{ $allKeysProvider['trader_resources'] }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/trading-contest') ? 'active' : '' }}" href="{{ route('auth.contest') }}">
                        <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{ $allKeysProvider['trading_contest'] }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/newsletter') ? 'active' : '' }}" href="{{ route('auth.newsletter') }}">
                        <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{ $allKeysProvider['newsletters'] }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/contest-subscribers') ? 'active' : '' }}" href="{{ route('auth.contest-subscriber') }}">
                        <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{__('frontend.sidebar.contest_subscriber')}}</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/setting') ? 'active' : '' }}" href="{{ route('auth.setting') }}">
                <i class="ri-settings-2-line"></i> <span data-key="t-widgets">{{ $allKeysProvider['setting'] }}</span>
                </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/site-setting') ? 'active' : '' }}" href="{{ route('auth.site-setting') }}">
                        <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{ $allKeysProvider['site_setting'] }}</span>
                    </a>
                </li>



                {{-- <li class="nav-item">
                    <a class="nav-link menu-link  {{ request()->is('admin/trading-contest-rules') ? 'active' : '' }}" href="{{ route('auth.contest-rules') }}">
                <i class="ri-list-settings-fill"></i><span data-key="t-widgets">{{ $allKeysProvider['trading_contest_rules'] }}</span>
                </a>
                </li> --}}




















            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>