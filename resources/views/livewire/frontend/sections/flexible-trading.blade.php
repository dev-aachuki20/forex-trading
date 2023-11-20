<li>
    <div>
        <div class="trade-timeline-outer">
            <div class="icon">
                <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.why_trade_with_us3') }}" alt="icon">
            </div>
            <div class="timeline-details">
                <h5>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Flexible Trading' }}</h5>
                <div class="discription">
                    <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'We have no restrictions on trading style. Our program allows for any strategy.' !!}</p>    
                </div>
            </div>
        </div>
    </div>
</li>