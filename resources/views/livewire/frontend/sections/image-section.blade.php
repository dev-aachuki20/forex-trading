<section class="bg-light-white side-by-step padding-tb-120 padding-bottom-160">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-icons-sec">
                    {{-- one time fee --}}
                    @livewire('frontend.sections.one-time-fee', ['localeid' => $localeid])
                    {{-- any stratagy --}}
                    @livewire('frontend.sections.any-strategy', ['localeid' => $localeid])
                    {{-- two simple rule --}}
                    @livewire('frontend.sections.two-simple-rules', ['localeid' => $localeid])
                    {{-- pass quickely --}}
                    @livewire('frontend.sections.pass-quikely', ['localeid' => $localeid])
                </div>
            </div>
            @if(!is_null($sectionDetail))
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{$sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.trading_rules') }}" alt="img-1">
                </div>
            </div>
            @endif
        </div>
    </div>
</section>