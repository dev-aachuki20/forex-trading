@extends('layouts.frontend')
@section('title', 'Home')

@section('styles')
@stop

@section('content')

<section class="home-banner ovarlay-color" style="background-image: url(images/banner-bg.jpg);">
    <div class="container z-10 position-relative">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="home-banner-text">
                    <h1 class="text-white">Traders Wanted accelerated trader funding</h1>
                    <div class="discription text-white body-font-large">
                        <p>Capitalize on your trading skills and amplify your returns with a funded trader account you
                            keep up to 90% of the profits.</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-white" href="#">Start Trading</a>
                        <a class="custom-btn outline-color-white" href="#">learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- package -->
@livewire('frontend.sections.package',['localeid' => $localeid])
<!-- package end -->

<section class="company-works-sec padding-top-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>How does our company works</h2>
                    <div class="discription">
                        <p>Take a one-step Audition, and once you achieve a 10% profit target, you receive a funded
                            account — up to $1 million. You keep up to 90% of your profits. Simple rules. No time
                            limits. Great customer service.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="company-works-sec-outer">
                    <div class="gloab-bg-img">
                        <img src="{{asset('images/half-earth.svg')}}" alt="half-earth">
                    </div>
                    <div class="box-outer">
                        <div class="box-video">
                            <div class="bg-video" style="background-image: url(images/news-img.jpg);">
                                <div class="bt-play">
                                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M41.7108 27.5123L20.4197 13.9199V41.1046L41.7108 27.5123Z" fill="white" />
                                        <path d="M22.9631 53.1667C22.8666 53.1667 22.77 53.1581 22.6722 53.1398C20.0787 52.6546 17.5817 51.7783 15.2509 50.5365C12.9715 49.3216 10.8863 47.7767 9.05423 45.9458C7.22212 44.1137 5.67723 42.0286 4.46356 39.7491C3.22178 37.4184 2.34667 34.9214 1.86023 32.3278C1.70012 31.4735 2.26356 30.6509 3.11789 30.4908C3.97223 30.3307 4.79478 30.8941 4.9549 31.7485C6.68067 40.9665 14.0323 48.3194 23.2503 50.0439C24.1047 50.204 24.6681 51.0266 24.508 51.8809C24.3675 52.6387 23.7062 53.1667 22.9631 53.1667Z" fill="white" />
                                        <path d="M32.0369 53.1667C31.2938 53.1667 30.6326 52.6387 30.4908 51.8821C30.3307 51.0278 30.8941 50.2053 31.7484 50.0451C40.9665 48.3194 48.3193 40.9677 50.0439 31.7497C50.204 30.8954 51.0266 30.3319 51.8809 30.492C52.7352 30.6521 53.2987 31.4747 53.1386 32.329C52.6533 34.9226 51.777 37.4196 50.5352 39.7504C49.3203 42.0298 47.7754 44.1149 45.9446 45.947C44.1124 47.7791 42.0273 49.324 39.7479 50.5377C37.4171 51.7795 34.9201 52.6546 32.3266 53.141C32.23 53.1581 32.1322 53.1667 32.0369 53.1667Z" fill="white" />
                                        <path d="M3.40985 24.5361C3.3133 24.5361 3.21674 24.5275 3.11896 24.5092C2.26463 24.3491 1.70119 23.5265 1.8613 22.6722C2.34652 20.0786 3.22285 17.5816 4.46463 15.2509C5.67952 12.9714 7.22441 10.8863 9.0553 9.0542C10.8874 7.22209 12.9725 5.6772 15.252 4.46353C17.5827 3.22175 20.0797 2.34664 22.6733 1.8602C23.5276 1.70009 24.3502 2.26353 24.5103 3.11786C24.6704 3.9722 24.107 4.79475 23.2526 4.95486C14.0334 6.68064 6.68052 14.0335 4.95596 23.2515C4.81419 24.0081 4.15296 24.5361 3.40985 24.5361Z" fill="white" />
                                        <path d="M51.59 24.5361C50.8469 24.5361 50.1857 24.0081 50.0439 23.2515C48.3181 14.0335 40.9664 6.68064 31.7484 4.95609C30.8941 4.79597 30.3307 3.97342 30.4908 3.11909C30.6509 2.26475 31.4734 1.70131 32.3278 1.86142C34.9213 2.34664 37.4183 3.22297 39.7491 4.46475C42.0286 5.67964 44.1137 7.22453 45.9458 9.05542C47.7779 10.8875 49.3228 12.9726 50.5364 15.2521C51.7782 17.5829 52.6533 20.0799 53.1398 22.6734C53.2999 23.5278 52.7364 24.3503 51.8821 24.5104C51.7843 24.5275 51.6866 24.5361 51.59 24.5361Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                            <div class="video-container">
                                <video width="560" height="315" controls>
                                    <source src="video/video.mp4" type="video/mp4">
                                    <source src="video/video.ogg" type="video/ogg">
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- partners -->
@livewire('frontend.sections.partners',['localeid' => $localeid])
<!-- partners end -->

<section class="bg-white side-by-side padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{asset('images/hold-trades.png')}}" alt="hold-trades">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2 class="max-w-427">Hold Trades over the weekend</h2>
                    <div class="discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make.</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="#">Start Trading</a>
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
                    <h2 class="max-w-427">Hold Trades over the weekend</h2>
                    <div class="discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make.</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="#">Start Trading</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-step-list">
                    <div class="side-by-step-item">
                        <a href="#">
                            <div class="step-head">
                                <div class="step-count">01</div>
                                <div class="step-name">Step</div>
                            </div>
                            <div class="step-details">
                                <h4>ForexTrader Audition</h4>
                                <div class="step-details-dis">
                                    <p>Choose your tier and take our SurgeTrader Audition. Follow risk management rules
                                        and achieve appropriate targets using whichever trading style you like. No
                                        limits on instruments. No minimum trading days. No 30-day mandatory trading
                                        period.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="side-by-step-item">
                        <a href="#">
                            <div class="step-head">
                                <div class="step-count">02</div>
                                <div class="step-name">Step</div>
                            </div>
                            <div class="step-details">
                                <h4>ForexTrader Funded Account</h4>
                                <div class="step-details-dis">
                                    <p>You made it! Now you can utilize your trading discipline with our capital. Trade
                                        consistently and responsibly to earn real money — up to 90% of your profits.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light-white side-by-side padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{asset('images/glob.png')}}" alt="glob">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>Why we were different</h2>
                    <div class="discription">
                        <p>One-stage assessment with simple, straightforward trading rules.</p>
                    </div>
                    <ul>
                        <li>
                            <a href="#">
                                <div class="icon">
                                    <img src="{{asset('images/icons/timerpause.svg')}}" alt="timerpause">
                                </div>
                                <div class="icon-text">No Time Limits</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon">
                                    <img src="{{asset('images/icons/stickynote.svg')}}" alt="stickynote">
                                </div>
                                <div class="icon-text">Simple Rules</div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="icon">
                                    <img src="{{asset('images/icons/usertick.svg')}}" alt="usertick">
                                </div>
                                <div class="icon-text">One-Time Investment In Yourself</div>
                            </a>
                        </li>
                    </ul>
                    <div class="discription">
                        <p>Choose your tier and take the SurgeTrader Audition. The trading rules are simple and
                            straightforward — not a complicated list with dozens of rules you need to comply with.</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="#">Start Trading</a>
                        <a class="custom-btn outline-color-azul" href="#">learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trader-portal padding-tb-120 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mb-5">
                    <h2>Trader Portal</h2>
                    <div class="discription">
                        <p>We know that good traders are addicted to numbers. With our platform, you can track all your
                            trading activity through our user-friendly trader portal. Everything you need on a
                            simple-to-use dashboard.</p>
                    </div>
                    <div class="button-group justify-content-center">
                        <a class="custom-btn outline-color-azul" href="#">Start Trading</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="gloab-bg-img text-center">
                    <img src="{{asset('images/trader-portal.png')}}" alt="trader-portal">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="earn-more-sec padding-top-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-between align-items-end">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="section-head padding-bottom-120">
                    <h2 class="max-w-427">Earn more from your Trading Activity</h2>
                    <div class="discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make.</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn fill-btn" href="#">Start Trading</a>
                        <a class="custom-btn outline-color-azul" href="#">learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="earn-more-img">
                    <img src="{{asset('images/earn-more.png')}}" alt="earn-more">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- testimonial -->
@livewire('frontend.sections.testimonial',['localeid' => $localeid])
<!-- testimonial -->

<!-- WhyTradeWithUs -->
<section class="why-trade-sec padding-tb-120 bg-light-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mb-5">
                    <h2>Why Trade with us</h2>
                    <div class="discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="why-trade-timeline">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="trade-timeline-outer">
                                    <div class="icon">
                                        <img src="{{asset('images/icons/1.svg')}}" alt="icon">
                                    </div>
                                    <div class="timeline-details">
                                        <h5>Clear & Simple Trading Rules</h5>
                                        <p>Trading rules that are easy to understand and comply with.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="trade-timeline-outer">
                                    <div class="icon">
                                        <img src="{{asset('images/icons/2.svg')}}" alt="icon">
                                    </div>
                                    <div class="timeline-details">
                                        <h5>One-Time Audition Fee</h5>
                                        <p>No monthly fee. No hidden costs. No recurring costs. Just a one-time
                                            investment.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="trade-timeline-outer">
                                    <div class="icon">
                                        <img src="{{asset('images/icons/3.svg')}}" alt="icon">
                                    </div>
                                    <div class="timeline-details">
                                        <h5>Flexible Trading</h5>
                                        <p>We have no restrictions on trading style. Our program allows for any
                                            strategy.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="trade-timeline-outer">
                                    <div class="icon">
                                        <img src="{{asset('images/icons/4.svg')}}" alt="icon">
                                    </div>
                                    <div class="timeline-details">
                                        <h5>Easy Payout</h5>
                                        <p>Get paid on your profits with a couple clicks — no minimum required.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="trade-timeline-outer">
                                    <div class="icon">
                                        <img src="{{asset('images/icons/5.svg')}}" alt="icon">
                                    </div>
                                    <div class="timeline-details">
                                        <h5>Quick Customer Service</h5>
                                        <p>Get answers quickly with our responsive customer service channels.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="trade-timeline-outer">
                                    <div class="icon">
                                        <img src="{{asset('images/icons/6.svg')}}" alt="icon">
                                    </div>
                                    <div class="timeline-details">
                                        <h5>Instant Funding</h5>
                                        <p>Get funded instantly upon successfully passing the SurgeTrader Audition.</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WhyTradeWithUs -->


<!-- model onload -->
<div class="modal fade sel-buy-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-head">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="sel-buy-top-img">
                    <img src="{{asset('images/bulls.svg')}}" alt="bulls">
                </div>
                <div class="sel-buy-main-text bg-azul text-center text-white">
                    <h2 class="text-white">Surge Trading</h2>
                    <div class="discription">
                        <p>70% of your visitors do exactly what you just did and never come back!</p>
                    </div>
                    <div class="divider"></div>
                    <h3>Keep Them on Your site longer with</h3>
                    <div class="bg-img-main"> Surgetrader</div>
                    <div class="button-group justify-content-center">
                        <a href="#" class="custom-btn outline-color-white">Claim Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@stop