<section class="tradable-instruments-sec padding-tb-120 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription">
                        {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="tradable-instruments-box text-center">
                    <span class="tradable-label text-azul">To download the full list of tradable assets, click
                        below:</span>
                    <h4 class="text-center">Tradable Assets on All Platforms</h4>
                    <div class="eightcap-img-box">
                        <div class="eightcap-img">
                            <img src="{{ asset('images/eightcap.png') }}" alt="eightcap">
                        </div>
                    </div>
                    <div class="discription mb-20">
                        <p>FX, oil, metals, indices, crypto and the most popular stocks.</p>
                    </div>
                    <div class="download-box">
                        <h4 class="text-azul text-center">Download</h4>
                        <ul>
                            <li><a href="#"><img src="{{ asset('images/icons/windows.svg') }}" alt="windows"></a>
                            </li>
                            <li><a href="#"><img src="{{ asset('images/icons/website.svg') }}" alt="website"></a>
                            </li>
                            <li><a href="#"><img src="{{ asset('images/icons/mac.svg') }}" alt="mac"></a>
                            </li>
                            <li><a href="#"><img src="{{ asset('images/icons/android.svg') }}" alt="android"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
