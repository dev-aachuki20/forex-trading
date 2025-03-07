<div class="header-top-outer">
    @if(request()->is(app()->getLocale()))
    @if($showDisclaimer)
    <div class="v2-cookie">
        <div class="v2-cookie-disclaimer">
            <div class="rte--output">{{__('By using our website you agree to our use of cookies in accordance with our') }}
                <a href="{{ route('other-page',['lang'=> app()->getLocale() ,'pageName' => 'cookies-policy']) }}">{{__('cookie policy')}}</a>.
            </div>
            <a class="v2-btn custom-btn fill-btn" data-ref="cookie-disclaimer__close" wire:click="setCookies">{{__('Okay')}} </a>
        </div>
    </div>
    @endif
    @endif
    <header id="header" class="header-main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{ getSetting('site_logo') ? getSetting('site_logo') : asset(config('constants.default.logo')) }}" alt="logo" width="160px">
                </a>
                <div class="mobile-view">
                    <div class="header-btns">
                        <ul>
                            <li>
                                <div class="search-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M13.0001 4H19.0001M13.0001 7H16.0001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20 10.5C20 15.75 15.75 20 10.5 20C5.25 20 1 15.75 1 10.5C1 5.25 5.25 1 10.5 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M20.9999 21L18.9999 19" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('auth.admin.login', app()->getLocale())}}" class="custom-btn outline-color-white">{{$allKeysProvider['login']}}</a>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <!-- home route -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is(app()->getLocale()) ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">{{$allKeysProvider['home']}}</a>
                        </li>
                        @if(isPageVisible('get-funded') ||  isPageVisible('surge-trader-audition') || isPageVisible('scaling-plan') || isPageVisible('trading-rules') || isPageVisible('tradable-assets') || isPageVisible('technology'))
                        <li class="nav-item dropdown">
                            <a href="javascript:void();" class="nav-link {{ request()->is(app()->getLocale().'/get-funded') || request()->is(app()->getLocale().'/scaling-plan') || request()->is(app()->getLocale().'/surge-trader-audition') || request()->is(app()->getLocale().'/technology') || request()->is(app()->getLocale().'/tradable-assets') || request()->is(app()->getLocale().'/trading-rules') ? 'collapsed active' : '' }}">{{$allKeysProvider['how_funding_works']}}</a>
                            <ul>

                                @if(isPageVisible('get-funded'))
                                <li><a class="{{ request()->is(app()->getLocale().'/get-funded') ? 'active' : '' }}" href="{{route('get-funded')}}">{{$allKeysProvider['get_funded']}}</a></li>
                                @endif

                                @if(isPageVisible('surge-trader-audition'))
                                <li><a class="{{ request()->is(app()->getLocale().'/surge-trader-audition') ? 'active' : '' }}" href="{{route('surge-trader-audition')}}">{{$allKeysProvider['surge_trader_audition']}}</a></li>
                                @endif

                                @if(isPageVisible('scaling-plan'))
                                <li><a class="{{ request()->is(app()->getLocale().'/scaling-plan') ? 'active' : '' }}" href="{{route('scaling-plan')}}">{{$allKeysProvider['scaling_plan']}}</a></li>
                                @endif

                                @if(isPageVisible('trading-rules'))
                                <li><a class="{{ request()->is(app()->getLocale().'/trading-rules') ? 'active' : '' }}" href="{{route('trading-rules')}}">{{$allKeysProvider['trading_rules']}}</a></li>
                                @endif

                                @if(isPageVisible('tradable-assets'))
                                <li><a class="{{ request()->is(app()->getLocale().'/tradable-assets') ? 'active' : '' }}" href="{{route('tradable-assets')}}">{{$allKeysProvider['tradable_assets']}}</a></li>
                                @endif

                                @if(isPageVisible('technology'))
                                <li><a class="{{ request()->is(app()->getLocale().'/technology') ? 'active' : '' }}" href="{{route('technology')}}">{{$allKeysProvider['technology']}}</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(isPageVisible('learn-forex-trading'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is(app()->getLocale().'/learn-forex-trading') ? 'active' : '' }}" href="{{route('learn-forex-trading')}}">{{$allKeysProvider['learn_forex_trading']}}</a>
                        </li>
                        @endif

                        @if(isPageVisible('faq'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is(app()->getLocale().'/faq') ? 'active' : '' }}" href="{{route('faq')}}">{{$allKeysProvider['faq']}}</a>
                        </li>
                        @endif

                        @if(isPageVisible('traders-corner-blog') ||  isPageVisible('traders-resources') || isPageVisible('trading-contest') || isPageVisible('news') || isPageVisible('bk-forex-membership'))
                        <li class="nav-item dropdown">
                            <a href="javascript:void();" class="nav-link {{ request()->is(app()->getLocale().'/traders-corner-blog') || request()->is(app()->getLocale().'/traders-resources') || request()->is(app()->getLocale().'/trading-contest') || request()->is(app()->getLocale().'/news') || request()->is(app()->getLocale().'/bk-forex-membership') ? 'collapsed active' : '' }}">{{$allKeysProvider['resources']}}</a>
                            <ul>
                                @if(isPageVisible('traders-corner-blog'))
                                <li><a class="{{ request()->is(app()->getLocale().'/traders-corner-blog') ? 'active' : '' }}" href="{{route('traders-corner-blog')}}">{{$allKeysProvider['the_trader_corner_blog']}}</a></li>
                                @endif

                                @if(isPageVisible('traders-resources'))
                                <li><a class="{{ request()->is(app()->getLocale().'/traders-resources') ? 'active' : '' }}" href="{{route('traders-resources')}}">{{$allKeysProvider['trader_resources']}}</a></li>
                                @endif

                                @if(isPageVisible('trading-contest'))
                                <li><a class="{{ request()->is(app()->getLocale().'/trading-contest') ? 'active' : '' }}" href="{{route('trading-contest')}}">{{$allKeysProvider['trading_contest']}}</a></li>
                                @endif

                                @if(isPageVisible('news'))
                                <li><a class="{{ request()->is(app()->getLocale().'/news') ? 'active' : '' }}" href="{{route('news')}}">{{$allKeysProvider['in_the_news']}}</a></li>
                                @endif

                                @if(isPageVisible('bk-forex-membership'))
                                <li data-test="{{isPageVisible(app()->getLocale().'/bk-forex-membership')}}"><a class="{{ request()->is('bk-forex-membership') ? 'active' : '' }}" href="{{route('bk-forex-membership')}}">{{$allKeysProvider['bk_forex_membership']}}</a></li>
                                @endif

                            </ul>
                        </li>
                        @endif

                        @if(isPageVisible('our-founder') ||  isPageVisible('surgetrader-team') || isPageVisible('about-surgetrader') || isPageVisible('contact-us'))
                        <li class="nav-item dropdown">
                            <a href="javascript:void();" class="nav-link {{ request()->is(app()->getLocale().'/about-surgetrader') || request()->is(app()->getLocale().'/contact-us') || request()->is(app()->getLocale().'/our-founder') || request()->is(app()->getLocale().'/surgetrader-team') ? 'collapsed active' : '' }}">{{$allKeysProvider['about_us']}}</a>
                            <ul>
                                @if(isPageVisible('our-founder'))
                                <li><a class="{{ request()->is(app()->getLocale().'/our-founder') ? 'active' : '' }}" href="{{route('our-founder')}}">{{$allKeysProvider['meet_our_founder']}}</a></li>
                                @endif

                                @if(isPageVisible('surgetrader-team'))
                                <li><a class="{{ request()->is(app()->getLocale().'/surgetrader-team') ? 'active' : '' }}" href="{{route('surgetrader-team')}}">{{$allKeysProvider['surge_trader_team']}}</a></li>
                                @endif

                                @if(isPageVisible('about-surgetrader'))
                                <li><a class="{{ request()->is(app()->getLocale().'/about-surgetrader') ? 'active' : '' }}" href="{{route('about-surgetrader')}}">{{$allKeysProvider['about_surgetrader']}}</a></li>
                                @endif

                                @if(isPageVisible('contact-us'))
                                <li><a class="{{ request()->is(app()->getLocale().'/contact-us') ? 'active' : '' }}" href="{{route('contact-us')}}">{{$allKeysProvider['contact_us']}}</a></li>
                                @endif
                            </ul>
                        </li>
                        @endif

                        @if(isPageVisible('affiliate'))
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is(app()->getLocale().'/affiliate') ? 'active' : '' }}" href="{{route('affiliate')}}">{{$allKeysProvider['affiliate']}}</a>
                        </li>
                        @endif
                    </ul>
                    <div class="header-btns">
                        <ul>
                            <li>
                                <div class="search-icon">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M13.0001 4H19.0001M13.0001 7H16.0001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M20 10.5C20 15.75 15.75 20 10.5 20C5.25 20 1 15.75 1 10.5C1 5.25 5.25 1 10.5 1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M20.9999 21L18.9999 19" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>

                            <li class="nav-item dropdown language-dropdown">
                                <a href="javascript:void();" class="nav-link">{{ __('cruds.' . $langCode) }}</a>
                                <ul>
                                    @foreach($language as $lang)
                                    {{-- <li wire:click="changeLanguage('{{$lang->code}}')"> --}}
                                    <li>
                                        @php
                                        $currentPath = Request::path();
                                        $currentLocale = app()->getLocale();
                                        $newPath = str_replace("/$currentLocale/", "/$lang->code/", "/$currentPath/");
                                        $newUrl = url($newPath);
                                        @endphp

                                        <a class="{{ $langCode == $lang->code ? 'active' : '' }}" href="{{ $newUrl }}">
                                            <img src="{{ asset($lang->icon) }}" alt="{{ucfirst($lang->name)}}" class="me-2">{{ __('cruds.' . $lang->name) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="get_funded">
                                <a href="{{route('get-funded')}}" class="custom-btn outline-color-white">{{$allKeysProvider['get_funded']}}</a>
                            </li>
                            <li class="login_wrapbtn">
                                <a href="{{route('auth.admin.login', app()->getLocale())}}" class="custom-btn fill-btn">{{$allKeysProvider['login']}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="search-form">
                <div class="container">
                    <form class="py-4">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="{{$allKeysProvider['search_here']}}">
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</div>
@push('scripts')
<script>
    @if($showDisclaimer)
    $('body').addClass('show-cookies');

    @else
    $('body').removeClass('show-cookies');
    @endif

    document.addEventListener('removeCookieClass', function(event) {
        $('body').removeClass('show-cookies');
    });
</script>
@endpush