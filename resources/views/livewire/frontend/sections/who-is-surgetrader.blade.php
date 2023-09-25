<section class="side-by-side padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.who_is_urgetrader') }}" alt="glob">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Who Is Surgetrader?' }}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                </div>
            </div>
        </div>
    </div>
</section>