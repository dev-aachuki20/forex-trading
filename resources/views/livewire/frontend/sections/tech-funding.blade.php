<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.onetime_fee') }}" alt="dollarsquare">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Funding' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Pass our audition and we’ll give you our money to trade." !!}</p>
        </div>
    </div>
</div>