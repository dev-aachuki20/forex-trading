<section class="bg-light-white side-by-side padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Our Philanthropy' }}</h2>
                    <div class="discription mb-0">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "A cornerstone of who we are at SurgeTrader is in making a difference through philanthropy — giving back to our communities and to organizations across the globe that need a helping hand. We believe that thriving communities can change the world, and that’s why SurgeTrader invests time, funds and resources in social impact programs" !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

                <div class="our-philanthropy-logo">
                    <ul>
                        @if ($imageData)
                        <li><img src="{{ $imageData[0]->file_url ?? config('constants.section_image_default.philanthropy_img1') }}" alt="logo-1"></li>
                        <li><img src="{{ $imageData[1]->file_url ?? config('constants.section_image_default.philanthropy_img2') }}" alt="logo-2"></li>
                        <li><img src="{{ $imageData[2]->file_url ?? config('constants.section_image_default.philanthropy_img3') }}" alt="logo-3"></li>
                        <li><img src="{{ $imageData[3]->file_url ?? config('constants.section_image_default.philanthropy_img4') }}" alt="logo-4"></li>
                        @endif
                    </ul>
                </div>

                {{-- @livewire('frontend.sections.about-surgetrader-philanthropy-images', ['localeid' => $localeid]) --}}

                {{-- <div class="our-philanthropy-logo">
                    <ul>
                        @foreach($sectionDetail->multiple_image_urls as $key => $image)
                        <li><img src="{{$image->file_url}}" alt="multiple-image-{{$key}}"></li>
                @endforeach

                @for($i = count($sectionDetail->multiple_image_urls); $i < 4; $i++) <li><img src="{{asset('images/about-surgetrader/logo-' . ($i + 1) . '.png')}}" alt="logo-{{$i + 1}}"></li>
                    @endfor
                    </ul>
            </div> --}}
        </div>
    </div>
    </div>
</section>