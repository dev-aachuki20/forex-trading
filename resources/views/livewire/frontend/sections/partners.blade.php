<div>
    @if($partnerslogo->count()>0)
    <section class="bg-white slider-logos-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-header-outer">
                        <div class="section-header-left">
                            <h4 class="section-header-title">As Seen on</h4>
                        </div>
                        <div class="logos">
                            <div class="swiper swiper-container slider-logos">
                                <div class="swiper-wrapper">

                                    @foreach($partnerslogo as $partner)
                                    <div class="swiper-slide grid-block">
                                        <div class="image">
                                            <img src="{{$partner->image_url}}" alt="slider-logos">
                                        </div>
                                    </div>
                                    @endforeach

                                    <!-- <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="images/slider-logo/2.png" alt="slider-logos">
                                    </div>
                                </div> -->
                                    <!-- <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="images/slider-logo/3.png" alt="slider-logos">
                                    </div>
                                </div>
                                <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="images/slider-logo/4.png" alt="slider-logos">
                                    </div>
                                </div>
                                <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="images/slider-logo/5.png" alt="slider-logos">
                                    </div>
                                </div>
                                <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="images/slider-logo/1.png" alt="slider-logos">
                                    </div>
                                </div>
                                <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="images/slider-logo/2.png" alt="slider-logos">
                                    </div>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>