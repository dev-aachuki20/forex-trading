<section class="bg-white padding-tb-120 account-limits-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                {{-- account limit --}}
                @livewire('frontend.sections.account-limits', ['localeid' => $localeid])
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="side-by-step-list account-limits-list">
                    {{-- max drawdowns --}}
                    @livewire('frontend.sections.max-drawdowns', ['localeid' => $localeid])

                    {{-- daily loss limits --}}
                    @livewire('frontend.sections.daily-loss-limits', ['localeid' => $localeid])

                </div>
            </div>
        </div>
    </div>
</section>
