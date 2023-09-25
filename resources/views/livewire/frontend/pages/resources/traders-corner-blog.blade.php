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
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : "The Trader's Corner Blog" }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Find helpful tips and information from the world of trading — technical analysis, fundamental analysis, market outlooks and more.' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif


    <section class="bg-white blog-latest padding-tb-120">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="fw-700">{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Our Latest Blogs' }}</h2>
                        <div class="discription mb-0">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has' !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 align-self-end">
                    <div class="blog-filter">
                        <form wire:submit.prevent="submitFilter" class="d-flex">
                            <div class="form-group-row d-flex">
                                <div class="form-group">
                                    <select class="form-control" wire:model="selectedCategory">
                                        <option>{{ trans('frontend.all_categories') ?? 'All Categories'}}</option>
                                        @foreach($allCategories as $category)
                                        <option value="{{ $category }}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" wire:model="search" placeholder="{{__('frontend.search')}}...." name="" class="form-control">
                                    {{-- @error('search')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror --}}
                                </div>

                            </div>
                            <div class="form-group-search">
                                <button type="submit" class="search-btn custom-btn fill-btn">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M11.8008 4.06641H17.2008M11.8008 7.06095H14.5008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M18.1 10.555C18.1 15.7954 14.275 20.0377 9.55 20.0377C4.825 20.0377 1 15.7954 1 10.555C1 5.31454 4.825 1.07227 9.55 1.07227" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path opacity="0.4" d="M18.9992 21.0335L17.1992 19.0371" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg> {{__('frontend.search')}}
                                </button>

                            </div>
                            <div class="form-group-search">
                                <button wire:click.prevent="resetFilters" class="search-btn custom-btn fill-btn">
                                    {{__('frontend.reset')}}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="blog-list">
                <div class="row gap-24">
                    @if(count($allBlogs)>0)
                    @foreach($allBlogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog-box position-relative">
                            <div class="blog-img">
                                @if($blog->image_url)
                                <img src="{{$blog->image_url}}" alt="blog-img">
                                @else
                                <img src="{{asset('images/blog-img.jpg')}}" alt="blog-img">
                                @endif
                            </div>
                            <div class="blog-text-main">
                                <div class="blog-card">
                                    <label class="blog-date">
                                        {{ convertDateTimeFormat($blog->created_at,'date_month') }}
                                    </label>
                                    <h4 class="mb-20">{{ucwords($blog->title)}}</h4>
                                    <h6 class="mb-20">{{$blog->category ? ucwords($blog->category) : ''}}</h6>
                                    <div class="discription">
                                        <p>{!! $blog->description ? ucfirst(substr(strip_tags($blog->description), 0, 185)) : '' !!}</p>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a class="custom-btn outline-color-azul stretched-link" href="{{route('blog-detail',$blog->slug)}}">{{__('frontend.read_more')}}
                                        <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.3195 1L21 6L15.3195 11M20.211 6H1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

                @if(count($allBlogs)>0)
                {{ $allBlogs->links('vendor.pagination.custom') }}
                @endif
            </div>
        </div>
    </section>

    <!-- 25 Rules To Becoming A Disciplined Trader'-->
    @livewire('frontend.sections.disciplined-trader', ['localeid' => $localeid])
</div>