<section class="bg-white-to-offblue-gradient-color side-by-step padding-tb-120 padding-bottom-160">
    <div class="container">
        <div class="row align-items-center">
            @if(!is_null($sectionDetail))
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Accelerate Your Journey To Being A Funded Trader' }}</h2>
                    <div class="discription mb-0">
                        {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6 col-sm-12">
                <div class="side-icons-sec">
                    {{-- tech fast --}}
                    @livewire('frontend.sections.tech-fast', ['localeid' => $localeid])

                    {{-- tech dashboard --}}
                    @livewire('frontend.sections.tech-dashboard', ['localeid' => $localeid])

                    {{-- tech funding --}}
                    @livewire('frontend.sections.tech-funding', ['localeid' => $localeid])

                    {{-- tech profit --}}
                    @livewire('frontend.sections.tech-profit', ['localeid' => $localeid])

                </div>
            </div>
        </div>
    </div>
</section>