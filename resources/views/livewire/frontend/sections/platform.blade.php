<section class="bg-white side-by-side padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.platform') }}" alt="fixi-logo">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Platform' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Get your account and access our proprietary trader portal in under 5 minutes through our leading-edge automation technology. No waiting. No screening. Just SurgeTrading.' !!}</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>