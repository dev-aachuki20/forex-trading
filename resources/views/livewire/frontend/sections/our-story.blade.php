<section class="becoming-rules-sec padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription">
                        {!! $sectionDetail ? ucwords($sectionDetail->description) : '' !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="becoming-rules-img">
                    <div class="becoming-rules-img-main">
                        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.our_story') }}" alt="our-story">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>