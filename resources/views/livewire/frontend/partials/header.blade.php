<div class="header-top-outer">
    @if(request()->is('/'))
    @if($showDisclaimer)
    <div class="v2-cookie">
        <div class="v2-cookie-disclaimer">
            <div class="rte--output">By using our website you agree to our use of cookies in accordance with our
                <a href="#">cookie policy</a>.
            </div>
            <a class="v2-btn custom-btn fill-btn" data-ref="cookie-disclaimer__close" wire:click="setCookies"> Okay </a>
        </div>
    </div>
    @endif
    @endif
    <header id="header" class="header-main">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">{{$allKeysProvider['forex_trading']}}</a>
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
                                <a href="{{route('get-funded')}}" class="custom-btn outline-color-white">{{$allKeysProvider['get_funded']}}</a>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{route('home')}}">{{$allKeysProvider['home']}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void();" class="nav-link {{ request()->is('get-funded') || request()->is('scaling-plan') || request()->is('surge-trader-audition') || request()->is('technology') || request()->is('tradable-assets') || request()->is('trading-rules') ? 'collapsed active' : '' }}">{{$allKeysProvider['how_funding_works']}}</a>
                            <ul>
                                <li><a class="{{ request()->is('get-funded') ? 'active' : '' }}" href="{{route('get-funded')}}">{{$allKeysProvider['get_funded']}}</a></li>
                                <li><a class="{{ request()->is('surge-trader-audition') ? 'active' : '' }}" href="{{route('surge-trader-audition')}}">{{$allKeysProvider['surge_trader_audition']}}</a></li>
                                <li><a class="{{ request()->is('scaling-plan') ? 'active' : '' }}" href="{{route('scaling-plan')}}">{{$allKeysProvider['scaling_plan']}}</a></li>
                                <li><a class="{{ request()->is('trading-rules') ? 'active' : '' }}" href="{{route('trading-rules')}}">{{$allKeysProvider['trading_rules']}}</a></li>
                                <li><a class="{{ request()->is('tradable-assets') ? 'active' : '' }}" href="{{route('tradable-assets')}}">{{$allKeysProvider['tradable_assets']}}</a></li>
                                <li><a class="{{ request()->is('technology') ? 'active' : '' }}" href="{{route('technology')}}">{{$allKeysProvider['technology']}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('learn-forex-trading') ? 'active' : '' }}" href="{{route('learn-forex-trading')}}">{{$allKeysProvider['learn_forex_trading']}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('faq') ? 'active' : '' }}" href="{{route('faq')}}">{{$allKeysProvider['faq']}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void();" class="nav-link {{ request()->is('traders-corner-blog') || request()->is('traders-resources') || request()->is('trading-contest') || request()->is('news') || request()->is('bk-forex-membership') ? 'collapsed active' : '' }}">{{$allKeysProvider['resources']}}</a>
                            <ul>
                                <li><a class="{{ request()->is('traders-corner-blog') ? 'active' : '' }}" href="{{route('traders-corner-blog')}}">{{$allKeysProvider['the_trader_corner_blog']}}</a></li>
                                <li><a class="{{ request()->is('traders-resources') ? 'active' : '' }}" href="{{route('traders-resources')}}">{{$allKeysProvider['trader_resources']}}</a></li>
                                <li><a class="{{ request()->is('trading-contest') ? 'active' : '' }}" href="{{route('trading-contest')}}">{{$allKeysProvider['trading_contest']}}</a></li>
                                <li><a class="{{ request()->is('news') ? 'active' : '' }}" href="{{route('news')}}">{{$allKeysProvider['in_the_news']}}</a></li>
                                <li><a class="{{ request()->is('bk-forex-membership') ? 'active' : '' }}" href="{{route('bk-forex-membership')}}">{{$allKeysProvider['bk_forex_membership']}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="javascript:void();" class="nav-link {{ request()->is('about-surgetrader') || request()->is('contact-us') || request()->is('our-founder') || request()->is('surgetrader-team') ? 'collapsed active' : '' }}">{{$allKeysProvider['about_us']}}</a>
                            <ul>
                                <li><a class="{{ request()->is('our-founder') ? 'active' : '' }}" href="{{route('our-founder')}}">{{$allKeysProvider['meet_our_founder']}}</a></li>
                                <li><a class="{{ request()->is('surgetrader-team') ? 'active' : '' }}" href="{{route('surgetrader-team')}}">{{$allKeysProvider['surge_trader_team']}}</a></li>
                                <li><a class="{{ request()->is('about-surgetrader') ? 'active' : '' }}" href="{{route('about-surgetrader')}}">{{$allKeysProvider['about_surgetrader']}}</a></li>
                                <li><a class="{{ request()->is('contact-us') ? 'active' : '' }}" href="{{route('contact-us')}}">{{$allKeysProvider['contact_us']}}</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('affiliate') ? 'active' : '' }}" href="{{route('affiliate')}}">{{$allKeysProvider['affiliate']}}</a>
                        </li>
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
                            <li>
                                <a href="{{route('get-funded')}}" class="custom-btn outline-color-white">{{$allKeysProvider['get_funded']}}</a>
                            </li>
                            <li>
                                <a href="{{route('auth.admin.login')}}" class="custom-btn fill-btn">{{$allKeysProvider['login']}}</a>
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