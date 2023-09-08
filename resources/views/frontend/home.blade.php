@extends('layouts.frontend')
@section('title', 'Home')

@section('styles')
@stop

@section('content')

<!-- home banner -->
@livewire('frontend.sections.home-banner',['localeid' => $localeid])
<!-- package -->
@livewire('frontend.sections.package',['localeid' => $localeid])
<!-- our company work -->
@livewire('frontend.sections.our-company-work',['localeid' => $localeid])
<!-- partners -->
@livewire('frontend.sections.partners',['localeid' => $localeid])
<!-- over the weekend -->
@livewire('frontend.sections.over-the-weekend',['localeid' => $localeid])
<!-- over the weekend two-->
@livewire('frontend.sections.over-the-weekend-two',['localeid' => $localeid])



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