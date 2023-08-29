<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url(images/other-pages-bg.jpg);">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">News Releases</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>Official announcements highlighting recent SurgeTrader company news regarding philanthropy, program
                                updates, partnerships and other newsworthy announcements.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(count($allNews)>0)
    <section class="bg-white blog-latest latest-news padding-tb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head text-center">
                        <h2 class="fw-700">latest surgetrader news</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-list">
                <div class="row gap-24">
                    @foreach($allNews as $news)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="blog-box position-relative">
                            <div class="blog-img">
                                @if($news->image_url)
                                <img src="{{$news->image_url}}" alt="blog-img">
                                @else
                                <img src="{{asset('images/blog-img.jpg')}}" alt="blog-img">
                                @endif
                            </div>
                            <div class="blog-text-main">
                                <div class="blog-card">
                                    <label class="blog-date"> {{ convertDateTimeFormat($news->created_at,'date_month') }}
                                        <!-- 13-july-2023 -->
                                    </label>
                                    <h4 class="mb-20">{{ucwords($news->title)}}</h4>
                                    <div class="discription">
                                        <p>{!! $news->description !!}</p>
                                    </div>
                                </div>
                                <div class="button-group">
                                    <a class="custom-btn outline-color-azul stretched-link" href="#">Read More
                                        <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.3195 1L21 6L15.3195 11M20.211 6H1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $allNews->links('vendor.pagination.custom') }}

                <!-- <div class="">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.3027 5.7313C20.7722 5.7313 21.1527 6.11186 21.1527 6.5813C21.1527 7.05074 20.7722 7.4313 20.3027 7.4313V5.7313ZM0.515647 7.18234C0.183701 6.85039 0.183701 6.3122 0.515647 5.98026L5.92501 0.570891C6.25696 0.238945 6.79515 0.238945 7.1271 0.570891C7.45904 0.902837 7.45904 1.44103 7.1271 1.77297L2.31877 6.5813L7.1271 11.3896C7.45904 11.7216 7.45904 12.2598 7.1271 12.5917C6.79515 12.9237 6.25696 12.9237 5.92501 12.5917L0.515647 7.18234ZM20.3027 7.4313H1.11669V5.7313H20.3027V7.4313Z" />
                                    </svg>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">01</a></li>
                            <li class="page-item active"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <svg width="22" height="13" viewBox="0 0 22 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.11719 5.7313C0.647745 5.7313 0.267187 6.11186 0.267187 6.5813C0.267187 7.05074 0.647745 7.4313 1.11719 7.4313V5.7313ZM20.9043 7.18234C21.2362 6.85039 21.2362 6.3122 20.9043 5.98026L15.4949 0.570891C15.163 0.238945 14.6248 0.238945 14.2928 0.570891C13.9609 0.902837 13.9609 1.44103 14.2928 1.77297L19.1012 6.5813L14.2928 11.3896C13.9609 11.7216 13.9609 12.2598 14.2928 12.5917C14.6248 12.9237 15.163 12.9237 15.4949 12.5917L20.9043 7.18234ZM1.11719 7.4313H20.3032V5.7313H1.11719V7.4313Z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>
    </section>
    @endif
    <section class="becoming-rules-sec padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                    <div class="section-head">
                        <h2><strong>25 Rules</strong> to Becoming a Disciplined Trader</h2>
                        <div class="discription">
                            <p>How is it that some traders only last a few months while others carve out a lifetime career? One word…
                                discipline.</p>
                            <p>Download this free eBook for the top 25 most essential rules necessary to become a disciplined trader.
                            </p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="#">Access eBook Now</a>
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
</div>