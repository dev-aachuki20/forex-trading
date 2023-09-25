<div class="side-by-step-item">
    <a href="#">
        <div class="step-head">
            <div class="step-count">01</div>
            <div class="step-name">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Step' }}</div>
        </div>
        <div class="step-details">
            {!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Choose your account size and the ForexTrader Audition.' !!}
        </div>
    </a>
</div>