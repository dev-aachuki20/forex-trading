<section class="bg-white track-progress padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="{{ $sectionDetail ? ucwords($sectionDetail->link_one) : '' }}">{{ $sectionDetail ? ucwords($sectionDetail->button_one) : '' }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{asset('images/img-9.png')}}" alt="img-9">
                    <div class="chart-progress" id="stats_id">
                        <div class="gauge-cont" data-percentage="62">
                            <div class="gauge">
                                <div class="inner"></div>
                                <div class="spinner"></div>
                            </div>
                            <div class="pointer"></div>
                            <div class="pointer-knob"></div>
                        </div>
                        <div class="count-of-numbers">
                            168 <span> of</span> 361
                        </div>
                        <div class="lessons-completed">Lessons Completed</div>
                        <div class="forex-lock">
                            <img src="{{asset('images/trade-forex/forex.svg')}}" alt="forex">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>