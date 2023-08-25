<section class="our-traders-say-sec padding-tb-120 bg-white">
    <div class="container">
        <div class="inner-container">
            <div class="row">
                <div class="col-lg-8 col-sm-10">
                    <div class="section-head">
                        <h2 class="max-w-427">What our Traders say</h2>
                        <div class="discription">
                            <p>Trusted reviews from Trustpilot. Visit our Trustpilot page for more reviews.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="traders-say-slider-outer">
                    <div class="swiper-container traders-say-slider">

                        <div class="slider-arrows">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div class="swiper-wrapper">
                            @if($testimonials->count()>0)
                            @foreach($testimonials as $testimonial)
                            <div class="swiper-slide traders-say-list">
                                <div class="traders-say-head">
                                    <div class="traders-img">
                                        <img src="images/our-traders-1.png" alt="our-traders-1">
                                    </div>
                                    <div class="traders-name">
                                        <h4>{{ucfirst($testimonial->name)}}</h4>
                                        <p>{{ucwords($testimonial->company_name)}}</p>
                                    </div>
                                </div>
                                <div class="traders-say-text">
                                    <div class="discription">
                                        <p>{!! $testimonial->description !!}</p>
                                    </div>
                                    <div class="traders-rating">
                                        <ul>
                                            <li><img src="{{asset('images/Star.svg')}}" alt="stars"> </li>
                                            <li><img src="{{asset('images/Star.svg')}}" alt="stars"> </li>
                                            <li><img src="{{asset('images/Star.svg')}}" alt="stars"> </li>
                                            <li><img src="{{asset('images/Star.svg')}}" alt="stars"> </li>
                                            <li><img src="{{asset('images/Star.svg')}}" alt="stars"> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                            <!-- <div class="swiper-slide traders-say-list">
                                <div class="traders-say-head">
                                    <div class="traders-img">
                                        <img src="images/our-traders-2.png" alt="our-traders-2">
                                    </div>
                                    <div class="traders-name">
                                        <h4>Floyd Miles</h4>
                                        <p>Amazing customer service</p>
                                    </div>
                                </div>
                                <div class="traders-say-text">
                                    <div class="discription">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took </p>
                                    </div>
                                    <div class="traders-rating">
                                        <ul>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide traders-say-list">
                                <div class="traders-say-head">
                                    <div class="traders-img">
                                        <img src="images/our-traders-3.png" alt="our-traders-3">
                                    </div>
                                    <div class="traders-name">
                                        <h4>Kathryn Murphy</h4>
                                        <p>Amazing customer service</p>
                                    </div>
                                </div>
                                <div class="traders-say-text">
                                    <div class="discription">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took </p>
                                    </div>
                                    <div class="traders-rating">
                                        <ul>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide traders-say-list">
                                <div class="traders-say-head">
                                    <div class="traders-img">
                                        <img src="images/our-traders-1.png" alt="our-traders-1">
                                    </div>
                                    <div class="traders-name">
                                        <h4>Ralph Edwards</h4>
                                        <p>Amazing customer service</p>
                                    </div>
                                </div>
                                <div class="traders-say-text">
                                    <div class="discription">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took </p>
                                    </div>
                                    <div class="traders-rating">
                                        <ul>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                            <li><img src="images/star.svg" alt="stars"> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>