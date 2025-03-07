<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url : asset('images/other-pages-bg.jpg') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail->sub_title ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    @if(!is_null($sectionDetail))
    <section class="bg-white padding-tb-120">
        <div class="container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-12">
                    <h2 class="max-w-427">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail->description ?? '' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

</div>

@push('scripts')

@endpush