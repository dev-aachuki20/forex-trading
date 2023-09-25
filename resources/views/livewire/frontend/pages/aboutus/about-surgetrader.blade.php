<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'About Us' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Lorem Ipsum is simply dummy text of the printing and typesetting.' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn" href="{{ route('get-funded') }}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- who-is-surgetrader -->
    @livewire('frontend.sections.who-is-surgetrader', ['localeid'=>$localeid])

    <!-- glance -->
    @livewire('frontend.sections.glance', ['localeid'=>$localeid])

    <!-- our story -->
    @livewire('frontend.sections.our-story', ['localeid'=>$localeid])

    <!-- testimonail -->
    @livewire('frontend.sections.testimonial', ['localeid'=>$localeid])

    <!-- why_is_surgeTrader-->
    @livewire('frontend.sections.why-is-surge-trader', ['localeid' => $localeid])

    <!-- Our Philanthropy-->
    @livewire('frontend.sections.our-philanthropy', ['localeid' => $localeid])


    <section class="image-slider-sec padding-tb-120 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="image-slider-outer">
                        <div class="swiper-container image-slider">
                            <div class="swiper-wrapper">
                                @foreach($galleries as $image)
                                <div class="swiper-slide image-slider-list">
                                    <div class="image-slider-list-main">
                                        <img src="{{asset($image->image_url)}}" alt="{{$image->title}}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="slider-arrows">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- earn-more-trading-activity'-->
    @livewire('frontend.sections.earn-more-trading-activity', ['localeid' => $localeid])
</div>

@push('scripts')
<script>
    var swiper = new Swiper('.image-slider', {
        slidesPerView: 4,
        spaceBetween: 24,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1200: {
                slidesPerView: 3,
            },
            960: {
                slidesPerView: 2,
            },
            575: {
                slidesPerView: 1,
            }
        }
    });
</script>
@endpush