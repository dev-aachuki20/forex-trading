@if(!is_null($sectionDetail))
<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.tech_dashboard') }}" alt="monitor">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Dashboard' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Track your performance and trading metrics in our trader portal.' !!}</p>
        </div>
    </div>
</div>
@endif