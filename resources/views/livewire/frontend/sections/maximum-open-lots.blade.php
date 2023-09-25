<div class="left-icon-list">
    <a href="get-funded.html">
        <div class="left-icon">
            <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.profit') }}" alt="favoritechart">
        </div>
        <div class="left-icon-text">
            <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Maximum Open Lots' }}</h4>
            <div class="discription">
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Traders may have a maximum number of open lots equal to 1/10000 the size of their account.' !!}</p>
            </div>
        </div>
    </a>
</div>