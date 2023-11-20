<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{$sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.stoploss') }}" alt="chart">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Any Strategy' }}</h4>
        <div class="step-details-dis discription">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Trade the strategy that works for you.' !!}</p>
        </div>
    </div>
</div>