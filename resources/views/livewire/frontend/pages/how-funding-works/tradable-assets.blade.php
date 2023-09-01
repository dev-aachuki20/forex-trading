<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url(images/other-pages-bg.jpg);">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">What Assets Can I Trade?</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>From FX to cryptocurrency to indices, SurgeTrader offers a wide variety of tradable assets & instruments.</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn outline-color-white" href="#">Start Trading</a>
                            <a class="custom-btn outline-color-white" href="#">Read FAQS</a>
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