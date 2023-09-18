<section class="becoming-rules-sec padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                <div class="section-head">
                    <h2>{!! $sectionDetail ? ucwords($sectionDetail->title) : 'Title' !!}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="#">{{ $allKeysProvider['access_ebook_now'] ?? 'Access eBook Now'}}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="becoming-rules-img">
                    <div class="becoming-rules-img-main">
                        <img src="{{asset('images/becoming-img.jpg')}}" alt="becoming-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>