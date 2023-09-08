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
    <section class="company-works-sec padding-top-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>School of Forex Trading</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</p>
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
                            <div class="box-video blue-overlay">
                                <div class="bg-video" style="background-image: url(images/img-8.png);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white track-progress padding-tb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2>Track Your Progress</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="#">Unlock Tracking, Sign In</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{asset('images/img-9.png')}}" alt="img-9">
                        <div class="chart-progress" id="stats_id">
                            <div class="gauge-cont" data-percentage="62">
                                <div class="gauge">
                                    <div class="inner"></div>
                                    <div class="spinner"></div>
                                </div>
                                <div class="pointer"></div>
                                <div class="pointer-knob"></div>
                            </div>
                            <div class="count-of-numbers">
                                168 <span> of</span> 361
                            </div>
                            <div class="lessons-completed">Lessons Completed</div>
                            <div class="forex-lock">
                                <img src="{{asset('images/trade-forex/forex.svg')}}" alt="forex">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="google-ads">
        <a href="#">
            <img src="{{asset('images/google-adds.jpg')}}" alt="google-adds">
        </a>
    </div>

    <section class="you-learn-sec padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>What you’ll Learn</h2>
                        <div class="discription">
                            <p>Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="you-learn-list">
                        <ul>
                            <li>Have a full understanding of how the Forex Market operates</li>
                            <li>Select a Forex Broker for your account</li>
                            <li>Understand what leverage is and how it affects your trading</li>
                            <li>Tell the difference between a Pip and a Point</li>
                            <li>You will learn the three types of Forex Analysis: Fundamental, Technical and Sentiment</li>
                            <li>By the end of this course you will have a substantial arsenal of technical analysis techniques</li>
                            <li>You will know the basics of calculating and managing risks when trading Forex</li>
                            <li>Have a full understanding of how the Forex Market operates</li>
                            <li>Understand what short selling is and the mechanics behind it</li>
                            <li>Know Forex terminology like Ask, Bid, Spread, Equity, etc.</li>
                            <li>Use all types of orders: Buy / Sell / Buystop / Sellstop / Buylimit / Selllimit</li>
                            <li>Be able to read the calendar of economic events</li>
                            <li>You will learn how to install and use the MetaTrader 4 trading platform</li>
                            <li>You will get an insanely discounted Bonus coupon for my next course</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- course content start -->
    @livewire('frontend.sections.course-content', ['localeid'=>$localeid])
    <!-- course content end -->

    <div class="google-ads">
        <a href="#">
            <img src="{{asset('images/google-adds-1.jpg')}}" alt="google-adds">
        </a>
    </div>

    <!-- course start -->
    @livewire('frontend.sections.course', ['localeid'=>$localeid])
    <!-- course end -->

    <div class="modal fade preview-video-popup" id="preview-video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="preview-video-outer">
                        <div class="preview-video-main">
                            <video width="560" height="315" controls="">
                                <source src="video/video.mp4" type="video/mp4">
                                <source src="video/video.ogg" type="video/ogg">
                            </video>
                        </div>
                        <div class="preview-video-details">
                            <p>1.2 What is Forex?</p>
                            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    jQuery(document).ready(function($) {
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('#stats_id').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                var i = 1;
                runAllGauges();
                a = 1;
            }

        });
    });

    function runAllGauges() {
        var gauges = $('.gauge-cont');
        $.each(gauges, function(i, v) {
            var self = this;
            setTimeout(function() {
                setGauge(self);
            }, i * 700);
        });
    }

    function resetAllGauges() {
        var gauges = $('.gauge-cont').get().reverse();
        $.each(gauges, function(i, v) {
            var self = this;
            setTimeout(function() {
                resetGauge(self);
            }, i * 700);
        });
    }

    function resetGauge(gauge) {
        var spinner = $(gauge).find('.spinner');
        var pointer = $(gauge).find('.pointer');
        $(spinner).attr({
            style: 'transform: rotate(0deg)'
        });
        $(pointer).attr({
            style: 'transform: rotate(-90deg)'
        });
    }

    function setGauge(gauge) {
        var percentage = $(gauge).data('percentage') / 100;
        var degrees = 180 * percentage;
        var pointerDegrees = degrees - 90;
        var spinner = $(gauge).find('.spinner');
        var pointer = $(gauge).find('.pointer');
        $(spinner).attr({
            style: 'transform: rotate(' + degrees + 'deg)'
        });
        $(pointer).attr({
            style: 'transform: rotate(' + pointerDegrees + 'deg)'
        });
    }
</script>
@endpush