<div class="side-by-step-item">
    <a href="#">
        <div class="step-details">
            <h4><span>4%</span> {{ $sectionDetail ? ucwords($sectionDetail->title) : ' 5% Daily Loss Limit' }}
            </h4>
            <div class="step-details-dis">
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Incurred losses cannot exceed 5% of your account equity in a given day.' !!}</p>
            </div>
        </div>
    </a>
</div>