<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Scaling Plan' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Traders can scale up to the next largest account size and earn at least 2x more buying power all the way from a $25K account up to a $1 million account.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- how it works --}}
    @livewire('frontend.sections.how-it-works', ['localeid' => $localeid])

    <!-- scale your account -->
    @livewire('frontend.sections.scale-your-account', ['localeid' => $localeid])

    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid' => $localeid])
</div>