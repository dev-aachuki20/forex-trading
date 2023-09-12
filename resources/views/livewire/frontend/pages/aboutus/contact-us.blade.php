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
                            <a class="custom-btn outline-color-white" href="{{ $pageDetail ? $pageDetail->link_two : '' }}">{{ $pageDetail ? ucfirst($pageDetail->button_one) : '' }}</a>
                            <a class="custom-btn outline-color-white" href="{{ $pageDetail ? $pageDetail->link_two : '' }}">{{ $pageDetail ? ucfirst($pageDetail->button_two) : '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="padding-tb-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
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
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/intlTelInput.js') }}"></script>

<script>
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
        // separateDialCode:true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.0/build/js/utils.js",
    });
    window.iti = iti;
</script>
@endpush