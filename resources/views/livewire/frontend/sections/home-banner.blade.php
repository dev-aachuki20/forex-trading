<div>
    @if($pageDetail)
    <section class="home-banner ovarlay-color" style="background-image: url({{$pageDetail->image_url ?? config('constants.banner_image_default.home') }});">
        <div class="container z-10 position-relative">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-white" href="{{ route('get-funded') }}">{{ $allKeysProvider['start_trading'] ?? 'Start Trading' }}</a>
                            <a class="custom-btn outline-color-white" href="{{ route('surge-trader-audition') }}">{{ $allKeysProvider['learn_more'] ?? 'Learn More' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>