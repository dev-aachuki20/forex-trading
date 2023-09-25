<div class="side-by-step-item">
    <a href="#">
        <div class="step-head">
            <div class="step-count">02</div>
            <div class="step-name">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Step' }}</div>
        </div>
        <div class="step-details">
            {!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Achieve a 10% profit target without breaching two straightforward rules.' !!}
        </div>
    </a>
</div>