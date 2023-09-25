@if(!is_null($sectionDetail))
<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.tech_profit') }}" alt="moneysend">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Profits' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Keep up to 90% of the profits you generate off or our capital.' !!}</p>
        </div>
    </div>
</div>
@endif