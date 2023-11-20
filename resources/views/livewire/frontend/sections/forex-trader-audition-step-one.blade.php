<div class="side-by-step-item">
    <a href="javascript:void(0);">
        <div class="step-head">
            <div class="step-count">01</div>
            <div class="step-name">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Step' }}</div>
        </div>
        <div class="step-details discription">
            {!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Choose your account size and the ForexTrader Audition.' !!}
        </div>
    </a>
</div>