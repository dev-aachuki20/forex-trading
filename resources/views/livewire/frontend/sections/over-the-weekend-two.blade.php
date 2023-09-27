<section class="bg-white side-by-step padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                @if(!is_null($sectionDetail))
                <div class="section-head">
                    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Hold Trades Over The Weekend' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make." !!}
                        </p>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="{{route('get-funded')}}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading'}}
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-step-list">
                    @livewire('frontend.sections.forex-trader-audition-step-one',['localeid' => $localeid])
                    @livewire('frontend.sections.forex-trader-audition-step-two',['localeid' => $localeid])
                </div>
            </div>
        </div>
    </div>
</section>