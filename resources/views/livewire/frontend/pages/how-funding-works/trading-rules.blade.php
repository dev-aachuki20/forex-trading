<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Trading Rules & Account Limits' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p> {{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Focus on making profit- Not on complying with a long list of trading rules.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- two easy follow rule --}}
    @livewire('frontend.sections.follow-rules', ['localeid' => $localeid])
    {{-- image section --}}
    @livewire('frontend.sections.image-section', ['localeid' => $localeid])

    {{-- limits --}}
    @livewire('frontend.sections.limits', ['localeid' => $localeid])

    <!-- earn-more-trading-activity'-->
    @livewire('frontend.sections.earn-more-trading-activity', ['localeid' => $localeid])

</div>