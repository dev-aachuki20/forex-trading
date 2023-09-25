<section class="earn-more-sec padding-top-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-between align-items-end">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="section-head padding-bottom-120">
                    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Start Trading' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'The first step to becoming a professional trader starts here. We have the tools. We have the capital. We need your talent. We want you to be the next SurgeTrader.' !!}</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn fill-btn" href="{{ route('get-funded') }}">{{ $allKeysProvider['start_trading'] }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="earn-more-img">
                    <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.start_trading') }}" alt="start-trading">
                </div>
            </div>
        </div>
    </div>
</section>