<section class="bg-white-to-offblue-gradient-color  padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-sm-12">
                <div class="section-head text-center mw-100">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'The Best Affiliate Fees' }}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Partner with SurgeTrader for the most competitive commissions available with any prop trading firm affiliate program. Our affiliates earn 20% of the initial purchase price for new auditions. Whether you are a trading content creator, education provider or group administrator, your referrals to SurgeTrader can earn you a sizable income!' !!}
                </div>

                <div class="row gap-24">
                    @if(!is_null($sectionDetailOne))
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="position-relative box-card">
                            <div class="box-icon">
                                <img src="{{ $sectionDetailOne->image_url ? $sectionDetailOne->image_url : asset('images/affiliates/1.svg') }}" alt="affiliates">
                            </div>
                            <div class="box-text">
                                <h4>{{ $sectionDetailOne ? ucwords($sectionDetailOne->title) : 'Receive a 20% commission' }}<br></h4>
                                <div class="discription">
                                    {!! $sectionDetailOne ? ucfirst($sectionDetailOne->description) : 'You receive a 20% affiliate commission on all initial accounts!' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!is_null($sectionDetailTwo))
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="position-relative box-card">
                            <div class="box-icon">
                                <img src="{{ $sectionDetailTwo->image_url ? $sectionDetailTwo->image_url : asset('images/affiliates/2.svg') }}" alt="affiliates">
                            </div>
                            <div class="box-text">
                                <h4>{{ $sectionDetailTwo ? ucwords($sectionDetailTwo->title) : 'High-Value Transactions' }}<br></h4>
                                <div class="discription">
                                 {!! $sectionDetailTwo ? ucfirst($sectionDetailTwo->description) : 'The Audition, valued at a million dollars, is available for $6,500 and offers a $1,300 affiliate commission!' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(!is_null($sectionDetailThree))
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="position-relative box-card">
                            <div class="box-icon">
                                <img src="{{ $sectionDetailThree->image_url ? $sectionDetailThree->image_url : asset('images/affiliates/3.svg') }}" alt="affiliates">
                            </div>
                            <div class="box-text">
                                <h4>{{ $sectionDetailThree ? ucwords($sectionDetailThree->title) : 'Regular Payouts' }}<br></h4>
                                <div class="discription">
                                  {!! $sectionDetailThree ? ucfirst($sectionDetailThree->description) : 'ReshardBell promptly issues payments at the start of every month.' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

</section>