<div class="left-icon-list">
    <a href="get-funded.html">
        <div class="left-icon">
            <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.profit') }}" alt="favoritechart">
        </div>
        <div class="left-icon-text">
            <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h4>
            <div class="discription">
                <p>{!! $sectionDetail ? ucwords($sectionDetail->description) : '' !!}</p>
            </div>
        </div>
    </a>
</div>