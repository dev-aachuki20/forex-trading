<section class="company-works-sec padding-top-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="company-works-sec-outer">
                    <div class="gloab-bg-img">
                        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.school_of_forex_trading') }}" alt="half-earth">
                    </div>
                    <div class="box-outer">
                        <div class="box-video blue-overlay">
                            <div class="bg-video" style="background-image: url(images/img-8.png);">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>