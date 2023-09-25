<li>
    <a href="#">
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us4') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Easy Payout' }}</h5>
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Get paid on your profits with a couple clicks — no minimum required.' !!}</p>
            </div>
        </div>
    </a>
</li>