@if(!is_null($sectionDetail))
<section class="company-works-sec padding-top-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'School Of Forex Trading' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a" !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="company-works-sec-outer">
                    <div class="gloab-bg-img">
                        <img src="{{ asset('images/half-earth.svg') }}" alt="half-earth">
                    </div>
                    <div class="box-outer">
                        <div class="box-video blue-overlay">
                            <div class="bg-video" style="background-image: url({{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.school_of_forex_trading') }});">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif