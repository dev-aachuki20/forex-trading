@if(!is_null($sectionDetail))
<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.profit') }}" alt="favoritechart">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Up To 90% Profit' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'You keep up to 90% of the profits you earn.' !!}</p>
        </div>
    </div>
</div>
@endif