<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.fast') }}"
            alt="shuttle">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucwords($sectionDetail->description) : '' !!}</p>
        </div>
    </div>
</div>