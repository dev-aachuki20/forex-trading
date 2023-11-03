<li>
    <div>
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us6') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Instant Funding' }}</h5>
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Get funded instantly upon successfully passing the SurgeTrader Audition.' !!}</p>
            </div>
        </div>
    </div>
</li>