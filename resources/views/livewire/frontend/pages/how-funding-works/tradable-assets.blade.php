<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn outline-color-white" href="{{ $pageDetail ? $pageDetail->link_one : ''}}">{{ $pageDetail ? ucfirst($pageDetail->button_one) : '' }}</a>
                            <a class="custom-btn outline-color-white" href="{{ $pageDetail ? $pageDetail->link_two : ''}}">{{ $pageDetail ? ucfirst($pageDetail->button_two) : '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="tradable-instruments-sec padding-tb-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>tradable instruments</h2>
                        <div class="discription">
                            <p>Within the SurgeTrader program, a variety of instruments are available for you to trade, including FX, select equities, major stock market indices, oil, metals and cryptocurrencies.</p>
                            <p>Traders have the option to trade on either of the most popular platforms which are offered through our partner broker EightCap.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="tradable-instruments-box text-center">
                        <span class="tradable-label text-azul">To download the full list of tradable assets, click below:</span>
                        <h4 class="text-center">Tradable Assets on All Platforms</h4>
                        <div class="eightcap-img-box">
                            <div class="eightcap-img">
                                <img src="{{asset('images/eightcap.png')}}" alt="eightcap">
                            </div>
                        </div>
                        <div class="discription mb-20">
                            <p>FX, oil, metals, indices, crypto and the most popular stocks.</p>
                        </div>
                        <div class="download-box">
                            <h4 class="text-azul text-center">Download</h4>
                            <ul>
                                <li><a href="#"><img src="{{asset('images/icons/windows.svg')}}" alt="windows"></a></li>
                                <li><a href="#"><img src="{{asset('images/icons/website.svg')}}" alt="website"></a></li>
                                <li><a href="#"><img src="{{asset('images/icons/mac.svg')}}" alt="mac"></a></li>
                                <li><a href="#"><img src="{{asset('images/icons/android.svg')}}" alt="android"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid'=>$localeid])
    <!-- packages end -->
</div>