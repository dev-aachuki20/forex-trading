<div>
    <section class="bg-light-white side-by-side padding-tb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_we_different') }}" alt="glob">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Why We Were Different' }}</h2>
                        {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                            </a>

                            <a class="custom-btn outline-color-azul" href="{{route('surge-trader-audition')}}">{{ $allKeysProvider['learn_more'] ?? 'Learn More'}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>