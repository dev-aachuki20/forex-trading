<li>
    <a href="#">
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us2') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'One-Time Audition Fee' }}</h5>
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'No monthly fee. No hidden costs. No recurring costs. Just a one-time investment.' !!}</p>
            </div>
        </div>
    </a>
</li>