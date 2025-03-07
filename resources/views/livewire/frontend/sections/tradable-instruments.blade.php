<section class="tradable-instruments-sec padding-tb-120 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Tradable Instruments' }}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-6 col-md-8 col-sm-12">
                <div class="tradable-instruments-box text-center">
                    <span class="tradable-label text-azul">@lang('frontend.To Download The Full List Of Tradable Assets, Click Below')</span>
                    <h4 class="text-center">@lang('frontend.Tradable Assets on All Platforms')</h4>
                    <div class="eightcap-img-box">
                        <div class="eightcap-img">
                            @php
                              $assetLogo = getSettingDetail('tradable_asset_logo');
                            @endphp

                            @if($assetLogo)
                            <img src="{{ $assetLogo->image_url ? $assetLogo->image_url : asset('images/eightcap.png')  }}" alt="eightcap" width="180px">
                            @else
                            <img src="{{ asset('images/eightcap.png') }}" alt="eightcap">
                            @endif
                        </div>
                    </div>
                    <div class="discription mb-20">
                        <p>@lang('frontend.FX, oil, metals, indices, crypto and the most popular stocks')</p>
                    </div>
                    <div class="download-box">
                        <h4 class="text-azul text-center">@lang('frontend.download')</h4>
                        <ul>
                            <li><a href="{{getSetting('microsoft_link') ? getSetting('microsoft_link') :  '#' }}" target="_blank"><img src="{{config('constants.tradable_asset.window')}}" alt="windows"></a>
                            </li>
                            <li><a href="{{getSetting('website_link') ? getSetting('website_link') :  '#' }}" target="_blank"><img src="{{config('constants.tradable_asset.website')}}" alt="website"></a>
                            </li>
                            <li><a href="{{getSetting('apple_link') ? getSetting('apple_link') :  '#' }}" target="_blank"><img src="{{config('constants.tradable_asset.apple')}}" alt="mac"></a>
                            </li>
                            <li><a href="{{getSetting('android_link') ? getSetting('android_link') :  '#' }}" target="_blank"><img src="{{config('constants.tradable_asset.android')}}" alt="android"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>