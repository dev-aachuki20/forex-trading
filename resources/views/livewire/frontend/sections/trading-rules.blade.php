<div>
    <section class="bg-white-to-offblue-gradient-color side-by-side padding-tb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.trading_rules') }}" alt="img-1">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="javascript:void(0)">{{ $allKeysProvider['view_rules_limits'] ?? 'View Rules Limits'}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>