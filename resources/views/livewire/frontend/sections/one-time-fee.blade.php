@if(!is_null($sectionDetail))
<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.onetime_fee') }}" alt="dollarsquare">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'One-Time Fee' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'No monthly subscriptions. Just a single investment.' !!}</p>
        </div>
    </div>
</div>
@endif