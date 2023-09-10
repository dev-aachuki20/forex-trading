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
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{ asset('images/img-1.png') }}"
                        alt="img-1">
                </div>
            </div>
        </div>
    </div>
</section>
