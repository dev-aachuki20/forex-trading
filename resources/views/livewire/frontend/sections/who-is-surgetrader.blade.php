<section class="side-by-side padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-side-img">
                    <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.who_is_urgetrader') }}" alt="glob">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Who Is Surgetrader?' }}</h2>
                    
                    <div class="discription">
                        {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                    </div>
                    
                    <ul class="no-link">
                        @if(!is_null($this->sectionDetail_one))
                        <li>
                            <div class="icon">
                                <img src="{{ $sectionDetail_one->image_url ? $sectionDetail_one->image_url : asset('images/about-surgetrader/1.svg') }}" alt="1">
                            </div>
                            <div class="icon-text">{{ $sectionDetail_one ? ucwords($sectionDetail_one->title) : 'Simple, Straight Forward Trading Rules' }}</div>
                        </li>
                        @endif

                        @if(!is_null($this->sectionDetail_two))
                        <li>
                            <div class="icon">
                                <img src="{{ $sectionDetail_two->image_url ? $sectionDetail_two->image_url : asset('images/about-surgetrader/2.svg') }}" alt="2">
                            </div>
                            <div class="icon-text">{{ $sectionDetail_two ? ucwords($sectionDetail_two->title) : 'One-Step Evaluation' }}</div>
                        </li>
                        @endif

                        @if(!is_null($this->sectionDetail_three))
                        <li>
                            <div class="icon">
                                <img src="{{ $sectionDetail_three->image_url ? $sectionDetail_three->image_url : asset('images/about-surgetrader/3.svg') }}" alt="3">
                            </div>
                            <div class="icon-text">{{ $sectionDetail_three ? ucwords($sectionDetail_three->title) : 'No Time Limits' }}</div>
                        </li>
                        @endif

                        @if(!is_null($this->sectionDetail_four))
                        <li>
                            <div class="icon">
                                <img src="{{ $sectionDetail_four->image_url ? $sectionDetail_four->image_url : asset('images/about-surgetrader/4.svg') }}" alt="4">
                            </div>
                            <div class="icon-text">{{ $sectionDetail_four ? ucwords($sectionDetail_four->title) : 'World-Class Customer Support' }}</div>
                        </li>
                        @endif
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>