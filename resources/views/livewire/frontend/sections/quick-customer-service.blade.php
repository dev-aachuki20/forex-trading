@if(!is_null($sectionDetail))
<li>
    <a href="#">
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us5') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Quick Customer Service' }}</h5>
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Get answers quickly with our responsive customer service channels.' !!}</p>
            </div>
        </div>
    </a>
</li>
@endif