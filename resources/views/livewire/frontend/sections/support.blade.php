<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.support') }}" alt="callcalling">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Support' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Responsive support to help with any issue or concern.' !!}</p>
        </div>
    </div>
</div>