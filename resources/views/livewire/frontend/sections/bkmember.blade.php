<div>

    @if($bkmembers->count()>0)
    <section class="padding-tb-120 trading-group-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-sm-12 ">
                    <div class="section-head text-center">
                        <div class="section-head-logo">
                            <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.bk_forex_member') }}" alt="bk-logo">
                        </div>
                        <h2 class="fw-700">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Trading Group Access & Training' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has' !!}</p>
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
                        <div class="access-list-outer">
                            <div class="access-list-text">
                                <h4>{{ucfirst($bkmember->name)}}</h4>
                                <div class="position text-azul">{{ucwords($bkmember->designation)}}</div>
                                <div class="discription body-font-small">
                                    <p>{!!$bkmember->description !!}</p>
                                </div>
                            </div>
                            <div class="seen-on">
                                <p class="mb-0"><span>{{__('As Seen On') }} :</span></p>
                                <ul>
                                    @if(count($bkmember->brand_image_url) > 0)
                                    @foreach($bkmember->brand_image_url as $key=>$brand_image)
                                    <li><img src="{{asset($brand_image->file_url)}}" alt="brand-logo-{{$key}}"></li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</div>