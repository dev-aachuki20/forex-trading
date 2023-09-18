<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn" href="{{ route('get-funded') }}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- meet our founder --}}
    @livewire('frontend.sections.meet-our-founder', ['localeid' => $localeid])


    {{-- Why Build Surgetrader? Find Out how It All Started --}}
    @livewire('frontend.sections.why-build-surgetrader', ['localeid' => $localeid])


    {{-- Lorem Ipsum Is Simply Dummy --}}
    @livewire('frontend.sections.our-founder-banner-section-one', ['localeid' => $localeid])

    <!-- INSTGRAM USER -->
    @livewire('frontend.sections.instgrammember', ['localeid' => $localeid])

    {{-- connect with me on social media --}}
    @livewire('frontend.sections.connect-on-social-media', ['localeid' => $localeid])


    <!--how it works -->
    @livewire('frontend.sections.how-it-works', ['localeid' => $localeid])

    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid' => $localeid])
</div>
@push('scripts')
<script>

    // JavaScript code to handle scrolling
    document.getElementById("joinMyTeam-our-founder-section").addEventListener("click", function() {
        // Scroll to Section 3
        document.getElementById("how-it-work-section").scrollIntoView({ behavior: "smooth" });
    });

    
    document.getElementById("joinMyTeam-why-build-section").addEventListener("click", function() {
        // Scroll to Section 3
        document.getElementById("how-it-work-section").scrollIntoView({ behavior: "smooth" });
    });

    document.getElementById("joinMyTeam-btn-banner").addEventListener("click", function() {
        // Scroll to Section 3
        document.getElementById("how-it-work-section").scrollIntoView({ behavior: "smooth" });
    });


    
</script>
@endpush