<div class="side-by-step-item">
    <a href="#">
        <div class="step-head">
            <div class="step-count">01</div>
            <div class="step-name">
                {{ $sectionDetail ? ucwords($sectionDetail->title) : 'Option' }}
            </div>
        </div>
        <div class="step-details discription">
            {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
        </div>
    </a>
</div>