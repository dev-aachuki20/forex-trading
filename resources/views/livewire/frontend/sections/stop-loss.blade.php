<div class="left-icon-list">
    <a href="get-funded.html">
        <div class="left-icon">
            <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.stoploss') }}" alt="chart">
        </div>
        <div class="left-icon-text">
            <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Stop Loss' }}</h4>
            <div class="discription">
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'A stop-loss is required for each trade.' !!}</p>
            </div>
        </div>
    </a>
</div>