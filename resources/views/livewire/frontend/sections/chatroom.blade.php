<section class="chatrooms-sec padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center mb-5">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : '24/7 Chatrooms' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Engage with Boris, Kathy, and trader peers in the 24/7 chatrooms, available in Slack or Telegram. Kathy and Boris both maintain channels where they post their live trade ideas — including entries and exits.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="chatrooms-img text-center">
                    <img src="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.chatrooms') }}" alt="chatrooms">
                </div>
            </div>
        </div>
    </div>
</section>