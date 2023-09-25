<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'We’re Here to Help You' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Lorem Ipsum is simply dummy text of the printing and typesetting.' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn outline-color-white" href="{{ route('get-funded') }}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading' }}</a>
                            <a class="custom-btn outline-color-white" href="{{ route('faq') }}">{{ $allKeysProvider['read_faqs'] ?? 'Read FAQs' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if(!is_null($sectionDetail))
    <section class="padding-tb-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Get In Touch' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "We’re here to help you supercharge your trading activity with accelerated profits. Fill out the form to share your inquiry, & we’ll get back to you ASAP." !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gap-24 mb-40">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="conatct-outer">
                        <a href="#">
                            <div class="contact-icon-inner d-flex align-items-center">
                                <div class="contact-icon-main">
                                    <img src="{{ asset('images/form-icon/call.svg') }}" alt="call">
                                </div>
                                <div class="contact-text">
                                    <h4>{!! getSetting('support_phone') !!}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="conatct-outer">
                        <a href="#">
                            <div class="contact-icon-inner d-flex align-items-center">
                                <div class="contact-icon-main"><img src="{{ asset('images/form-icon/sms.svg') }}" alt="sms"></div>
                                <div class="contact-text">
                                    <h4>{!! getSetting('support_email') !!}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="conatct-outer">
                        <div class="contact-icon-inner d-flex align-items-center">
                            <div class="contact-icon-main"><img src="{{ asset('images/form-icon/map.svg') }}" alt="map"></div>
                            <div class="contact-text">
                                <h4>{!! getSetting('address') !!}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- contact us  -->
            @livewire('frontend.sections.get-in-touch', ['localeid' => $localeid])
            <!-- contact us end -->

        </div>
    </section>
    @endif
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/intlTelInput.js') }}"></script>

<script>
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        // separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
        customPlaceholder: function() {
            return "Enter Phone Number";
        }
    });
    window.iti = iti;
</script>
@endpush