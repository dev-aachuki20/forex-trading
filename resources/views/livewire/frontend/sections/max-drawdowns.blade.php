<div class="side-by-step-item">
    <a href="#">
        <div class="step-details">
            <h4><span>5%</span> {{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}
            </h4>
            <div class="step-details-dis">
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
            </div>
        </div>
    </a>
</div>
