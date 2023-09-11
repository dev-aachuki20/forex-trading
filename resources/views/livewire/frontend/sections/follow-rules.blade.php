<section class="bg-white side-by-step padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            {{-- follow rule --}}
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription mb-30">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul"
                            href="{{ $sectionDetail ? ucfirst($sectionDetail->link_one) : '' }}">{{ $sectionDetail ? ucfirst($sectionDetail->button_one) : '' }}</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                <div class="left-icon-list-outer">
                    {{-- stop loss --}}
                    @livewire('frontend.sections.stop-loss', ['localeid' => $localeid])

                    {{-- max open lots --}}
                    @livewire('frontend.sections.maximum-open-lots', ['localeid' => $localeid])
                </div>
            </div>
        </div>
    </div>
</section>
