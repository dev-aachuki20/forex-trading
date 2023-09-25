<div>
    @if($glanceRecord->count()>0)

    <section class="surgetrader-sec bg-white padding-tb-120">
        <div class="container">
            @if(!is_null($sectionDetail))
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Surgetrader At A Glance' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="side-icons-sec surgetrader">
                        @foreach($glanceRecord as $glance)
                        <div class="side-icons-items">
                            <div class="side-icons-img bg-azul">
                                <img src="{{$glance->image_url ?? '#'}}" alt="5">
                            </div>
                            <div class="side-icon-text">
                                <h4>{{ucwords($glance->title)}}</h4>
                                <div class="step-details-dis">
                                    <p>{!! $glance->description!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>