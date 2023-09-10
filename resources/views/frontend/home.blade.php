@extends('layouts.frontend')
@section('title', 'Home')

@section('styles')
@stop

@section('content')

    <!-- home banner -->
    @livewire('frontend.sections.home-banner', ['localeid' => $localeid])
    <!-- package -->
    @livewire('frontend.sections.package', ['localeid' => $localeid])
    <!-- our company work -->
    @livewire('frontend.sections.our-company-work', ['localeid' => $localeid])
    <!-- partners -->
    @livewire('frontend.sections.partners', ['localeid' => $localeid])
    <!-- over the weekend -->
    @livewire('frontend.sections.over-the-weekend', ['localeid' => $localeid])
    <!-- over the weekend two-->
    @livewire('frontend.sections.over-the-weekend-two', ['localeid' => $localeid])
    <!-- why we different-->
    @livewire('frontend.sections.why-we-different', ['localeid' => $localeid])
    <!-- Trader Portal-->
    @livewire('frontend.sections.trader-portal', ['localeid' => $localeid])
    <!-- earn-more-trading-activity'-->
    @livewire('frontend.sections.earn-more-trading-activity', ['localeid' => $localeid])
    <!-- testimonial -->
    @livewire('frontend.sections.testimonial', ['localeid' => $localeid])

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
                                            <img src="{{ asset('images/icons/1.svg') }}" alt="icon">
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
                                            <img src="{{ asset('images/icons/2.svg') }}" alt="icon">
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
                                            <img src="{{ asset('images/icons/3.svg') }}" alt="icon">
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
                                            <img src="{{ asset('images/icons/4.svg') }}" alt="icon">
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
                                            <img src="{{ asset('images/icons/5.svg') }}" alt="icon">
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
                                            <img src="{{ asset('images/icons/6.svg') }}" alt="icon">
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
    <div class="modal fade sel-buy-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="sel-buy-top-img">
                        <img src="{{ asset('images/bulls.svg') }}" alt="bulls">
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
