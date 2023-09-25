<section class="why-trade-sec padding-tb-120 bg-light-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mb-5">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Why Trade With Us' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="why-trade-timeline">
                    <ul>
                        <!-- Clear & Simple Trading Rules -->
                        @livewire('frontend.sections.clear-and-simple-rules', ['localeid' => $localeid])


                        <!-- One-Time Audition Fee -->
                        @livewire('frontend.sections.one-ime-aud-fee', ['localeid' => $localeid])


                        <!-- Flexible Trading -->
                        @livewire('frontend.sections.flexible-trading', ['localeid' => $localeid])


                        <!-- Easy Payout -->
                        @livewire('frontend.sections.easy-payout', ['localeid' => $localeid])


                        <!-- Quick Customer Service -->
                        @livewire('frontend.sections.quick-customer-service', ['localeid' => $localeid])


                        <!-- Instant Funding -->
                        @livewire('frontend.sections.instant-funding', ['localeid' => $localeid])

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>