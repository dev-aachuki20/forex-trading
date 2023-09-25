<li>
    <a href="#">
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us3') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Flexible Trading' }}</h5>
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'We have no restrictions on trading style. Our program allows for any strategy.' !!}</p>
            </div>
        </div>
    </a>
</li>