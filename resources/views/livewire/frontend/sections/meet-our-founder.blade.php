<section class="side-by-side padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{ asset('images/img-7.png') }}" alt="img-7">
                    <div class="foubder-img">
                        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.our_founder') }}"
                            alt="img-3">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul"
                            href="{{ $sectionDetail ? $sectionDetail->link_one : '' }}">{{ $sectionDetail ? ucfirst($sectionDetail->button_one) : '' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
