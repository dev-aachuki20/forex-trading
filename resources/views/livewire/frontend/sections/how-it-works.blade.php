<section class="bg-white side-by-step padding-tb-120" id="how-it-work-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-sm-12">
                @if(!is_null($sectionDetail))
                <div class="section-head">
                    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'How It Works' }}</h2>
                    <div class="section-list">
                        {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}    
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" id="choose-account-size-btn" href="{{route('get-funded')}}">{{ $allKeysProvider['get_funded'] ?? 'Get Funded'}}
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-step-list">
                    {{-- option one  --}}
                    @livewire('frontend.sections.option-one', ['localeid' => $localeid])
                    {{-- option two --}}
                    @livewire('frontend.sections.option-two', ['localeid' => $localeid])

                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    // JavaScript code to handle scrolling
    document.getElementById("choose-account-size-btn").addEventListener("click", function() {
        // Scroll to Section 3
        document.getElementById("package-section").scrollIntoView({
            behavior: "smooth"
        });
    });
</script>
@endpush