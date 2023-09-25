<section class="bg-white side-by-step padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            @if(!is_null($sectionDetail))
            <div class="col-lg-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Two Easy-To-Follow Rules' }}</h2>
                    <div class="discription mb-30">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'At SurgeTrader, we make it easy to focus on what’s most important… finding good trades and making a profit.' !!}</p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                        </a>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6 col-sm-12">
                <div class="left-icon-list-outer">
                    {{-- stop loss --}}
                    @livewire('frontend.sections.stop-loss', ['localeid' => $localeid])

                    {{-- max open lots --}}
                    @livewire('frontend.sections.maximum-open-lots', ['localeid' => $localeid])
                </div>
            </div>
        </div>
    </div>
</section>