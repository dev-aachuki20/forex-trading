<section class="left-text-sec overlay-dark-gradient padding-tb-100" style="background-image:url({{ $sectionDetail->image_url ? $sectionDetail->image_url : asset('images/ads-bg2.jpg') }})">
    <div class="container position-relative z-10">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="section-head text-white">
                    <h2 class="text-white">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Lorem Ipsum is simply dummy' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy" !!}</p>
                    </div>
                    @if($sectionDetail->button_title)
                    <div class="button-group">
                        <a class="custom-btn outline-color-white" href="{{ $sectionDetail ? $sectionDetail->button : '#' }}" target="_blank">{{ $sectionDetail ? ucwords($sectionDetail->button_title) : 'Start Trading' }}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>