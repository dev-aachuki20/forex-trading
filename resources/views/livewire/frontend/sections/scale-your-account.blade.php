@if(!is_null($sectionDetail))
<section class="padding-tb-120 scale-your-account-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Scale Your Account From $25k To $1 Million' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever' !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="scale-your-account-list">
                    <ul>
                        <li>
                            <div class="scale-list">
                                <div class="scale-icon">
                                    <img src="{{ asset('images/scale-icon/1.svg') }}">
                                </div>
                                <div class="scale-text">
                                    <h4>$25,000</h4>
                                    <p>Starter</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="scale-list">
                                <div class="scale-icon">
                                    <img src="{{ asset('images/scale-icon/2.svg') }}">
                                </div>
                                <div class="scale-text">
                                    <h4>$50,000</h4>
                                    <p>Intermediate</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="scale-list">
                                <div class="scale-icon">
                                    <img src="{{ asset('images/scale-icon/3.svg') }}">
                                </div>
                                <div class="scale-text">
                                    <h4>$100,000</h4>
                                    <p>Seasoned</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="scale-list">
                                <div class="scale-icon">
                                    <img src="{{ asset('images/scale-icon/4.svg') }}">
                                </div>
                                <div class="scale-text">
                                    <h4>$250,000</h4>
                                    <p>Advanced</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="scale-list">
                                <div class="scale-icon">
                                    <img src="{{ asset('images/scale-icon/5.svg') }}">
                                </div>
                                <div class="scale-text">
                                    <h4>$500,000</h4>
                                    <p>Expert</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="scale-list">
                                <div class="scale-icon">
                                    <img src="{{ asset('images/scale-icon/6.svg') }}">
                                </div>
                                <div class="scale-text">
                                    <h4>$1,000,000</h4>
                                    <p>Starter</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endif