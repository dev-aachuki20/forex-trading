<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- bk members -->
    @livewire('frontend.sections.bkmember', ['localeid'=>$localeid])
    <!-- bk members end -->

    <!-- included section -->
    @livewire('frontend.sections.whatincluded', ['localeid'=>$localeid])
    <!-- included section end -->

    <!-- track record -->
    @livewire('frontend.sections.track-record', ['localeid'=>$localeid])

    <!-- chatrooms -->
    @livewire('frontend.sections.chatroom', ['localeid'=>$localeid])

    <!-- trading indicators -->
    @livewire('frontend.sections.trading-indicators', ['localeid'=>$localeid])

    <!-- Live Trading Webinars -->
    @livewire('frontend.sections.live-trading-webinars', ['localeid'=>$localeid])

    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid'=>$localeid])
    <!-- packages end -->
</div>