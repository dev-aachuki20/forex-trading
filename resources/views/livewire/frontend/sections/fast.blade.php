<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.fast') }}" alt="shuttle">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Fast' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Quick processing of profits into your account.' !!}</p>
        </div>
    </div>
</div>