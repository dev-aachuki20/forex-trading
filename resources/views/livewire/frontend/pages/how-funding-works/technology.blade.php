<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p> {{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn" href="{{ route('get-funded') }}">{{ $allKeysProvider['get_funded'] ?? 'Get Funded' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- platform --}}
    @livewire('frontend.sections.platform', ['localeid' => $localeid])

    {{-- accelerate-funded-trader --}}
    @livewire('frontend.sections.accelerate-funded-trader', ['localeid' => $localeid])

    <!-- features -->
    @livewire('frontend.sections.features', ['localeid' => $localeid])

    {{-- start trading --}}
    @livewire('frontend.sections.start-trading', ['localeid' => $localeid])

</div>