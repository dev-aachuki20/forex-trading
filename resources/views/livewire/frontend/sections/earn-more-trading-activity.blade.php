<div>
    <section class="earn-more-sec padding-top-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="section-head padding-bottom-120">
                        <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn fill-btn"
                                href="{{ $sectionDetail ? ucfirst($sectionDetail->link_one) : '' }}">{{ $sectionDetail ? ucfirst($sectionDetail->button_one) : '' }}</a>
                            <a class="custom-btn outline-color-azul"
                                href="{{ $sectionDetail ? ucfirst($sectionDetail->link_two) : '' }}">{{ $sectionDetail ? ucfirst($sectionDetail->button_two) : '' }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="earn-more-img">
                        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url :  config('constants.section_image_default.earn_more') }}" alt="earn-more">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
