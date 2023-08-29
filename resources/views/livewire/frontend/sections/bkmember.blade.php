<div>
    @if($bkmembers->count()>0)
    <section class="padding-tb-120 trading-group-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-12 ">
                    <div class="section-head text-center">
                        <div class="section-head-logo">
                            <img src="{{asset('images/bk-logo.png')}}" alt="bk-logo">
                        </div>
                        <h2 class="fw-700">trading group access & training</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gap-24">
                @foreach($bkmembers as $bkmember)
                <div class="col-lg-6 col-sm-12">
                    <div class="group-access-list">
                        <div class="group-access-img">
                            <img src="{{$bkmember->image_url}}" alt="img-3">
                        </div>
                        <h4>{{ucfirst($bkmember->name)}}</h4>
                        <div class="position text-azul">{{ucwords($bkmember->designation)}}</div>
                        <div class="discription body-font-small">
                            <p>{!!$bkmember->description !!}</p>
                        </div>
                        <div class="seen-on">
                            <p class="mb-0"><span>As Seen On:</span></p>
                            <ul>
                                <li><img src="{{asset('images/forex-membership/logo-1.png')}}" alt="logo-1"></li>
                                <li><img src="{{asset('images/forex-membership/logo-2.png')}}" alt="logo-2"></li>
                                <li><img src="{{asset('images/forex-membership/logo-3.png')}}" alt="logo-3"></li>
                                <li><img src="{{asset('images/forex-membership/logo-4.png')}}" alt="logo-4"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>