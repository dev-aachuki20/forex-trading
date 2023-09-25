<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.tech_fast') }}" alt="timerpause-white">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Fast' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Get immediate access to an account with tight spreads and low commissions.' !!}</p>
        </div>
    </div>
</div>