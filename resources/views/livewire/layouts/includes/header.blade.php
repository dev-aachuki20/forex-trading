<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index-2.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('admin/png/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('admin/png/logo-dark.png')}}" alt="" height="17">
                        </span>
                    </a>

                    <a href="index-2.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('admin/png/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('admin/png/logo-light.png')}}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </div>

            <div class="d-flex align-items-center">

                <!-- flags -->
                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        @if($langCode && $langCode == 'en')
                        <img id="header-lang-img" src="{{asset('/images/eng.svg')}}" alt="Header Language" height="20" class="rounded">
                        @elseif($langCode && $langCode == 'ja')
                        <img id="header-lang-img" src="{{asset('/images/japan.svg')}}" alt="Header Language" height="20" class="rounded">
                        @elseif($langCode && $langCode == 'th')
                        <img id="header-lang-img" src="{{asset('/images/thai.svg')}}" alt="Header Language" height="20" class="rounded">
                        @endif

                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <!-- item-->
                        <li>
                            @foreach($language as $lang)
                            <a type="button" class="dropdown-item notify-item language py-2 {{ $langCode == $lang->code ? 'active' : '' }}" wire:click="changeLanguage('{{$lang->code}}')" data-lang="{{$lang->code}}" title="{{$lang->name}}">
                                <img src="{{ asset($lang->icon) }}" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">{{ __('cruds.' . $lang->name) }}</span>
                            </a>
                            @endforeach

                        </li>


                    </div>
                </div>

                <!-- profile -->
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{ auth()->user() ? auth()->user()->profile_image_url : asset('admin/jpg/user.png') }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ucfirst(Auth::user()->name)}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text"><b>{{ucfirst(Auth::user()->getRoleNames()[0])}}</b></span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('auth.admin.profile_show')}}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{getLocalization('profile')}}</span></a>

                        <!-- <a href="{{ route('auth.admin.profile_show') }}" class="dropdown-item"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{getLocalization('change_password')}}</span></a> -->
                        <!-- <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{getLocalization('setting')}}</span></a> -->
                        @livewire('admin.auth.logout')
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>