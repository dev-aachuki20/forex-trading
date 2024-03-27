<div>
    @if($packages->count()>0)
    <section class="our-package package_wrapper bg-white padding-tb-120" id="package-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Our Packages' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="our-package-slider-outer">
                        <div class="swiper-container our-package-slider">
                            <div class="swiper-wrapper">
                                @foreach($packages as $package)
                                <div class="swiper-slide">
                                    <div class="our-package-list">
                                        <div class="our-package-top">
                                            <div class="plan-name">{{$package->package_name}}</div>
                                            <div class="plan-price">
                                                <h3>${{ number_format($package->price, 0, '.', ',') }}</h3>
                                                <p>{{__('frontend.investment_you_get')}}</p>
                                            </div>
                                            {{-- <div class="audition-fee">
                                                <label>{{__('frontend.audition_fee')}}</label>
                                                <div class="audition-fee-price">US ${{ number_format($package->audition_fee, 0, '.', ',') }}</div>
                                            </div> --}}

                                            <div class="audition-fee">
                                                <label>{{__('frontend.audition_fee')}}</label>
                                                <div class="audition-fee-price">{{$package->audition_fee ?? '0.0' }}</div>
                                            </div>

                                            {{--<div class="audition-fee">
                                                <label>{{__('frontend.audition_fee')}}</label>
                                                <div class="audition-fee-price">
                                                    @if(app()->getLocale() == 'ja')
                                                        JP¥{{ number_format($package->audition_fee, 0, '.', ',') }}
                                                    @elseif(app()->getLocale() == 'th')
                                                        ฿{{ number_format($package->audition_fee, 0, '.', ',') }}
                                                    @else
                                                        US ${{ number_format($package->audition_fee, 0, '.', ',') }}
                                                    @endif
                                                </div>
                                            </div>--}}

                                            <div class="plan-details showMore-wrapper textDetails showDetails-height">
                                                {!! $package->description !!}
                                            </div>
                                            <a href="javascript:void(0)" class="showDetails-more">{{__('frontend.show_more')}}</a>

                                        </div>
                                        <div class="our-package-bottom">
                                            <div class="button-group">
                                                <a href="#" class="custom-btn outline-color-azul w-100 text-center">{{__('frontend.learn_more')}}</a>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" class="custom-btn fill-btn w-100 text-center">{{__('frontend.start_trading')}}</a>
                                            </div>
                                            <a href="javascript:void(0)" class="w-100">{{__('frontend.free_trial')}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="slider-arrows package-arrows">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>