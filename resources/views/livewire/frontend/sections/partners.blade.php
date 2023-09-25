<section class="bg-white slider-logos-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="section-header-outer">
                    <div class="section-header-left">
                        <h4 class="section-header-title">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'As Seen On' }}</h4>
                    </div>
                    <div class="logos">
                        <div class="swiper swiper-container slider-logos">
                            <div class="swiper-wrapper">
                                @if($partnerslogo->count()>0)
                                @foreach($partnerslogo as $partner)
                                <div class="swiper-slide grid-block">
                                    <div class="image">
                                        <img src="{{$partner->image_url}}" alt="slider-logos">
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>