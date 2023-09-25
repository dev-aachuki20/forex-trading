<div>
    @if ($testimonials->count() > 0)
    <section class="our-traders-say-sec padding-tb-120 bg-white">
        <div class="container">
            <div class="inner-container">
                <div class="row">
                    <div class="col-lg-8 col-sm-10">
                        <div class="section-head">
                            <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'What Our Traders Say' }}
                            </h2>
                            <div class="discription">
                                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Trusted reviews from Trustpilot. Visit our Trustpilot page for more reviews.' !!}</p>
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
                                @foreach ($testimonials as $key=>$testimonial)
                                <div class="swiper-slide traders-say-list">
                                    <div class="traders-say-head">
                                        <div class="traders-img">
                                            @if ($testimonial->image_url)
                                            <img src="{{ $testimonial->image_url }}" alt="our-traders-{{$key}}">
                                            @else
                                            <img src="{{ asset('images/default-user.svg') }}" alt="default-trader-image-{{$key}}">
                                            @endif
                                        </div>
                                        <div class="traders-name">
                                            <h4>{{ ucfirst($testimonial->name) }}</h4>
                                            <p>{{ ucwords($testimonial->company_name) }}</p>
                                        </div>
                                    </div>
                                    <div class="traders-say-text">
                                        <div class="discription">
                                            <p>{!! $testimonial->description !!}</p>
                                        </div>
                                        <div class="traders-rating">
                                            <ul>
                                                @php
                                                $rating = (int)$testimonial->rating;
                                                @endphp
                                                @for($i=1; $i<=5; $i++) @if($i <=$rating) <li><img src="{{ asset('images/Star.svg') }}"> </li>
                                                    @else
                                                    <li><img src="{{ asset('images/Star-border.svg') }}"></li>
                                                    @endif
                                                    @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>