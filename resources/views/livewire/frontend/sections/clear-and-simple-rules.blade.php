<li>
    <a href="#">
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us1') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h5>
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
            </div>
        </div>
    </a>
</li>