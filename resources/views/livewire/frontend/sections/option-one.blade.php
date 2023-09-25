<div class="side-by-step-item">
    @if(!is_null($sectionDetail))
    <a href="#">
        <div class="step-head">
            <div class="step-count">01</div>
            <div class="step-name">
                {{ $sectionDetail ? ucwords($sectionDetail->title) : 'Option' }}
            </div>
        </div>
        <div class="step-details">
            {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
        </div>
    </a>
    @endif
</div>