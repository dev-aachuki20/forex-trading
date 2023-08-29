<div>
    @if($packages->count()>0)
    <section class="our-package bg-white padding-tb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>our packages</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever </p>
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
                                                <h3>${{$package->price}}</h3>
                                                <p>Investment you get</p>
                                            </div>
                                            <div class="audition-fee">
                                                <label>Audition Fee</label>
                                                <div class="audition-fee-price">US ${{$package->audition_fee}}</div>
                                            </div>
                                            <div class="plan-details">
                                                {!! $package->description !!}
                                            </div>
                                            <div class="button-group">
                                                <a href="#" class="custom-btn outline-color-azul w-100 text-center">Learn More</a>
                                            </div>
                                        </div>
                                        <div class="our-package-bottom">
                                            <div class="button-group">
                                                <a href="#" class="custom-btn fill-btn w-100 text-center">Start
                                                    Trading</a>
                                            </div>
                                            <a href="#" class="w-100">Free Trial</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>