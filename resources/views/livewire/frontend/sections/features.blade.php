<div>
    @if ($features->count() > 0)
        <section class="bg-white features-sec padding-tb-120">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-sm-12">
                        <div class="section-head text-center">
                            <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                            <div class="discription">
                                <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gap-24">
                    @foreach ($features as $feature)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="position-relative box-card">
                                <div class="box-icon">
                                    <img src="{{ $feature->image_url ? asset($feature->image_url) : asset('images/icons/cardtick.svg') }}" alt="cardtick">
                                </div>
                                <div class="box-text">
                                    <h4>{{ ucwords($feature->title) }}</h4>
                                    <div class="discription">
                                        <p>{!! $feature->description !!}</p>
                                    </div>
                                    <div class="button-group">
                                        <a class="custom-btn outline-color-azul stretched-link"
                                            href="{{ route('get-funded') }}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}</a>
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
