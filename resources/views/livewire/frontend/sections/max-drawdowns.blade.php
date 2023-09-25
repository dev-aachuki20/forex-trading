<div class="side-by-step-item">
    <a href="#">
        <div class="step-details">
            <h4><span>5%</span> {{ $sectionDetail ? ucwords($sectionDetail->title) : ' 8% Maximum Drawdown' }}
            </h4>
            <div class="step-details-dis">
                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Traders may not incur losses exceeding 8%, on a trailing basis up to starting balance +8%. Once a trader has reached 8% profits in their account, the trailing drawdown becomes obsolete, and traders are allowed to drawdown back to their starting balance before breaching.' !!}</p>
            </div>
        </div>
    </a>
</div>