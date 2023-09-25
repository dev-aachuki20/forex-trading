<div>
    @if($includes->count()>0)
    <section class="bg-white  padding-tb-120">
        <div class="container">
            @if(!is_null($sectionDetail))
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : "What's Included" }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "When you become a SurgeTrader, you instantly receive a 30-day membership to BKForex’s suite of resources — a $175 value." !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="row gap-24">
                @foreach($includes as $include)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="position-relative box-card">
                        <div class="box-icon">
                            <img src="{{$include->image_url}}" alt="forex-membership">
                        </div>
                        <div class="box-text">
                            <h4>{{ucwords($include->title)}}</h4>
                            <div class="discription">
                                <p>{!! $include->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="button-group justify-content-center">
                        <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>