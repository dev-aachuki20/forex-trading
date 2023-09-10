<section class="bg-white side-by-step padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    {!! $sectionDetail ? ucwords($sectionDetail->description) : '' !!}
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul"
                            href="{{ $sectionDetail ? ucwords($sectionDetail->link_one) : '' }}">{{ $sectionDetail ? ucwords($sectionDetail->button_one) : '' }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-step-list">
                    {{-- option one  --}}
                    @livewire('frontend.sections.option-one', ['localeid' => $localeid])
                    {{-- option two --}}
                    @livewire('frontend.sections.option-two', ['localeid' => $localeid])

                </div>
            </div>
        </div>
    </div>
</section>
