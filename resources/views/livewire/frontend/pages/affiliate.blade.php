<div class="outer-inner-container">
    @if ($pageDetail)
        <section class="other-page-banner ovarlay-color"
            style="background-image: url({{ $pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
            <div class="container z-10 position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="home-banner-text text-center">
                            <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                            <div class="discription text-white body-font-large mb-30">
                                <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                            </div>
                            <div class="button-group justify-content-center mt-0">
                                <a class="custom-btn fill-btn"
                                    href="{{ $pageDetail ? $pageDetail->link_one : '' }}">{{ $pageDetail ? ucfirst($pageDetail->button_one) : '' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- best_affiliate_fees -->
    @livewire('frontend.sections.best-affiliate-fee', ['localeid' => $localeid])

    <!-- Sign Up For The Surgetrader Affiliate Program -->
    @livewire('frontend.sections.sign-up-surgetrader', ['localeid' => $localeid])

    <section class="padding-tb-120 affiliate-faq-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>surgetrader affiliate program frequently asked questions</h2>
                        <div class="discription">
                            <p>Fill out the form below to gain access to our affiliate program portal, along with your
                                customized affiliate links, tracking metrics and affiliate marketing materials.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">What is the SurgeTrader Affiliate Program?</a>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        SurgeTrader loves helping traders access institutional trading capital. If you
                                        are interested in helping your network access trading capital and earning a
                                        healthy commission in the process, SurgeTrader offers the most competitive
                                        Affiliate Sales program in the prop trading industry. You earn a 20% affiliate
                                        commission on all initial accounts!
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">How do I get started?</a>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">How much does SurgeTrader pay affiliates for a
                                    referral?</a>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">Who can I refer?</a>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                    aria-controls="collapse4">How much can I earn as an affiliate?</a>
                                <div id="collapse4" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>

                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">Do I have to be a SurgeTrader account holder to
                                    qualify?</a>
                                <div id="collapseSix" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false"
                                    aria-controls="collapse7">When will I receive my affiliate fees?</a>
                                <div id="collapse7" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false"
                                    aria-controls="collapse8">What payment methods are available?</a>
                                <div id="collapse8" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false"
                                    aria-controls="collapse9">Can I collect an affiliate fee for my own account?</a>
                                <div id="collapse9" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false"
                                    aria-controls="collapse10">Can I bid on pay-per-click keywords in my marketing
                                    strategy?</a>
                                <div id="collapse10" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false"
                                    aria-controls="collapse11">What marketing assets does SurgeTrader provide?</a>
                                <div id="collapse11" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false"
                                    aria-controls="collapse12">Will SurgeTrader join us for a live stream or intro
                                    video?</a>
                                <div id="collapse12" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false"
                                    aria-controls="collapse13">Can I contribute to the SurgeTrader Discord?</a>
                                <div id="collapse13" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false"
                                    aria-controls="collapse14">Can SurgeTrader contribute to my online community?</a>
                                <div id="collapse14" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse15" aria-expanded="false"
                                    aria-controls="collapse15">What information is available on my affiliate
                                    dashboard?</a>
                                <div id="collapse15" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse16" aria-expanded="false"
                                    aria-controls="collapse16">How do I contact you?</a>
                                <div id="collapse16" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/intlTelInput.js') }}"></script>
@endpush
