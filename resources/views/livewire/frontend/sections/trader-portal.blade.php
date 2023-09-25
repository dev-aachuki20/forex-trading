<section class="trader-portal padding-tb-120 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mb-5">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Trader Portal' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'We know that good traders are addicted to numbers. With our platform, you can track all your trading activity through our user-friendly trader portal. Everything you need on a simple-to-use dashboard.' !!}</p>
                    </div>
                    <div class="button-group justify-content-center">
                        <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="gloab-bg-img text-center">
                    <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.trader_portal') }}" alt="trader-portal">
                </div>
            </div>
        </div>
    </div>
</section>