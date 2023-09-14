<div class="outer-inner-container">
    @if ($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn" href="{{ $pageDetail ? $pageDetail->link_one : '' }}">{{ $pageDetail ? ucfirst($pageDetail->button_one) : '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- best_affiliate_fees -->
    @livewire('frontend.sections.best-affiliate-fee', ['localeid' => $localeid])

    <!-- Sign Up For The Surgetrader Affiliate Program -->
    @livewire('frontend.sections.sign-up-surgetrader', ['localeid' => $localeid])

    @if($faqsrecords->count()>0)
    @foreach($faqsrecords as $faqType => $faqsByType)
    @php
    $getContent = getSectionContent(ucwords(config('constants.faq_setting_key')['7']), $this->localeid);
    @endphp
    <section class="padding-tb-120 affiliate-faq-sec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{$getContent && $getContent->title ?  ucwords($getContent->title) : ''}}</h2>
                        <div class="discription">
                            <p>{!! ucfirst($getContent->description) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqsrecords as $key => $record)
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapse{{$key}}">{{$record->question}}</a>
                                <div id="collapse{{$key}}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $record->answer !!}
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            @endforeach
                            <!-- <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">How do I get started?</a>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @endif
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/intlTelInput.js') }}"></script>
@endpush