<section class="bg-light-white side-by-side padding-tb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="section-head">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription mb-0">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="our-philanthropy-logo">
                    <ul>
                        <li><img src="{{asset('images/about-surgetrader/logo-1.png')}}" alt="logo-1"></li>
                        <li><img src="{{asset('images/about-surgetrader/logo-2.png')}}" alt="logo-2"></li>
                        <li><img src="{{asset('images/about-surgetrader/logo-3.png')}}" alt="logo-3"></li>
                        <li><img src="{{asset('images/about-surgetrader/logo-4.png')}}" alt="logo-4"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>