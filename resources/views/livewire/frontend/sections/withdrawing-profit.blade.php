<div>
    <section class="bg-white side-by-step padding-tb-120 padding-bottom-160">
        <div class="container">
            <div class="row align-items-center">
                @if(!is_null($sectionDetail))
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Withdrawing Profits' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'SurgeTraders can request a withdrawal of profits at any time, but no more frequently than every thirty days. When a withdrawal is requested, SurgeTrader will also withdraw its share of the profits and your new highwater equity will be marked down by the total amount of funds withdrawn.' !!}</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6 col-sm-12">
                    <div class="side-icons-sec">
                        {{-- profit --}}
                        @livewire('frontend.sections.profit', ['localeid' => $localeid])
                        {{-- easy --}}
                        @livewire('frontend.sections.easy', ['localeid' => $localeid])
                        {{-- fast --}}
                        @livewire('frontend.sections.fast', ['localeid' => $localeid])
                        {{-- support --}}
                        @livewire('frontend.sections.support', ['localeid' => $localeid])
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>