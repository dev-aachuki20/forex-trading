<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white side-by-step padding-tb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="max-w-427">how it works</h2>
                        <div class="discription mb-30">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been </p>
                        </div>
                        <div class="section-list">
                            <ul>
                                <li>Scale up from $25K all the way to $1MM</li>
                                <li>No minimum trading days</li>
                                <li>No 30-day assessment period</li>
                            </ul>
                        </div>
                        <div class="note body-font-small">
                            <p>* Note that if a trader breaches their account at any point in the scaling process, their Audition will be disqualified, and the trader must retry.</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="#">Get Funded</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-step-list">
                        <div class="side-by-step-item">
                            <a href="#">
                                <div class="step-head">
                                    <div class="step-count">01</div>
                                    <div class="step-name">Option</div>
                                </div>
                                <div class="step-details">
                                    <h4>Claim Your Fully Funded Account</h4>
                                    <div class="step-details-dis">
                                        <p>Choose your tier and take our SurgeTrader Audition. Follow risk management rules and achieve appropriate targets using whichever trading style you like. No limits on instruments. No minimum trading days. No 30-day mandatory trading period.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="side-by-step-item">
                            <a href="#">
                                <div class="step-head">
                                    <div class="step-count">02</div>
                                    <div class="step-name">Option</div>
                                </div>
                                <div class="step-details">
                                    <h4>Scale Up Your Account</h4>
                                    <div class="step-details-dis">
                                        <p>Scale your account to the next largest account size by earning an additional 10% of profit.</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-tb-120 scale-your-account-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>scale your account from $25k to $1 million</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Ipsum has been the industry's standard dummy</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="scale-your-account-list">
                        <ul>
                            <li>
                                <div class="scale-list">
                                    <div class="scale-icon">
                                        <img src="{{asset('images/scale-icon/1.svg')}}">
                                    </div>
                                    <div class="scale-text">
                                        <h4>$25,000</h4>
                                        <p>Starter</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="scale-list">
                                    <div class="scale-icon">
                                        <img src="{{asset('images/scale-icon/2.svg')}}">
                                    </div>
                                    <div class="scale-text">
                                        <h4>$50,000</h4>
                                        <p>Intermediate</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="scale-list">
                                    <div class="scale-icon">
                                        <img src="{{asset('images/scale-icon/3.svg')}}">
                                    </div>
                                    <div class="scale-text">
                                        <h4>$100,000</h4>
                                        <p>Seasoned</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="scale-list">
                                    <div class="scale-icon">
                                        <img src="{{asset('images/scale-icon/4.svg')}}">
                                    </div>
                                    <div class="scale-text">
                                        <h4>$250,000</h4>
                                        <p>Advanced</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="scale-list">
                                    <div class="scale-icon">
                                        <img src="{{asset('images/scale-icon/5.svg')}}">
                                    </div>
                                    <div class="scale-text">
                                        <h4>$500,000</h4>
                                        <p>Expert</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="scale-list">
                                    <div class="scale-icon">
                                        <img src="{{asset('images/scale-icon/6.svg')}}">
                                    </div>
                                    <div class="scale-text">
                                        <h4>$1,000,000</h4>
                                        <p>Starter</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid'=>$localeid])
    <!-- packages end -->
</div>