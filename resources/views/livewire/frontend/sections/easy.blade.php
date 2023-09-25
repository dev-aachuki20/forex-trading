<div class="side-icons-items">
    <div class="side-icons-img bg-azul">
        <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.easy') }}" alt="setting">
    </div>
    <div class="side-icon-text">
        <h4>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Easy' }}</h4>
        <div class="step-details-dis">
            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Withdraw your profits with a few clicks.' !!}</p>
        </div>
    </div>
</div>