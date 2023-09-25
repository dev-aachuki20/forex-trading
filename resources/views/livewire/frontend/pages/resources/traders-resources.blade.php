<div class="outer-inner-container">
    <!-- page loader  -->
    <div class="page-loader-wrapper" wire:loading>
        <div class="pageloader-inner">
            <img src="{{ asset('images/pageloader.gif') }}" alt="">
        </div>
    </div>
    <!-- end  -->

    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Trader Resources' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p> {{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Find a wealth of information for traders — from strategy to risk management to technical analysis and everything in between.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="bg-white-to-offblue-gradient-color blog-latest padding-tb-120">
        <div class="container">
            <div class="row">
                @if(!is_null($sectionDetail))
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="fw-700">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Featured' }}</h2>
                        <div class="discription mb-0">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has' !!}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6 col-sm-12 align-self-end">
                    <div class="blog-filter featured-filter">
                        <form class="d-flex" wire:submit.prevent="submitSearch">
                            <div class="form-group-row d-flex">
                                <div class="form-group">
                                    <input type="text" wire:model="search" placeholder="Search...." name="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group-search">
                                <button type="submit" class="search-btn custom-btn fill-btn">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M11.8008 4.06641H17.2008M11.8008 7.06095H14.5008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.1 10.555C18.1 15.7954 14.275 20.0377 9.55 20.0377C4.825 20.0377 1 15.7954 1 10.555C1 5.31454 4.825 1.07227 9.55 1.07227" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M18.9992 21.0335L17.1992 19.0371" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> Search</button>
                            </div>
                            <div class="form-group-search">
                                <button wire:click.prevent="resetFilters" class="search-btn custom-btn fill-btn">
                                    Reset
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @if($primaryresources)
            <div class="blog-list">
                <div class="row align-items-center gap-24">
                    <div class="col-lg-6 col-sm-12">
                        <div class="side-by-side-img">
                            <img src="{{ $primaryresources->image_url ? $primaryresources->image_url :  config('constants.trader_resource.primary_resource') }}" alt="img-1">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="section-head">
                            <h2>{{$primaryresources->title}}</h2>
                            <div class="discription">
                                <p>{!! $primaryresources->description !!}</p>
                            </div>
                            <div class="button-group">
                                <a class="custom-btn outline-color-azul" href="{{ $primaryresources->pdf_url ? $primaryresources->pdf_url :  '' }}">{{$allKeysProvider['download_now']}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    @if($resources->count()>0)
    <section class="trader-resources-sec padding-tb-120 bg-white">
        <div class="container">
            <div class="row gap-24">
                @foreach($resources as $resource)
                @if(! $resource->is_primary )
                <div class="col-lg-6 col-sm-12">
                    <div class="trader-resources-box">
                        <div class="trader-resources-img">
                            <div class="img-inner">
                                <img src="{{$resource->image_url}}" alt="trader-resources">
                            </div>
                        </div>
                        <div class="trader-resources-text">
                            <h4>{{$resource->title}}</h4>
                            <div class="discription discription-context">
                                {!! $resource->description !!}
                            </div>
                            <div class="button-group">
                                <a href="{{ $resource->pdf_url ? $resource->pdf_url :  '' }}" class="custom-btn outline-color-azul">{{$allKeysProvider['download_now']}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            {{ $resources->links('vendor.pagination.custom') }}
        </div>
    </section>
    @endif
</div>