<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url :asset('images/other-pages-bg.jpg')}});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($newsDetails)
    <section class="bg-white video-details-section padding-tb-120 blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 align-self-end">
                </div>
            </div>
            <div class="blog-list">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="blogData-box">
                            <div class="latestData-wrapper blogDetail-wrapper">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="blogBox-wrap">

                                            <div class="img-box mb-3">
                                                <img class="img-fluid" src="{{$newsDetails->image_url}}" alt="">
                                            </div>

                                            <div class="blogDetail-title mb-3">
                                                <h4>
                                                    {{ucwords($newsDetails->title)}}
                                                </h4>
                                            </div>

                                            <div class="description mb-3">
                                                <p>
                                                    {!! ucwords($newsDetails->description) !!}
                                                </p>
                                            </div>
                                            <!-- end  -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end latestData -->
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="blogRight-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mostPopular-wrap">
                                        <div class="blogHead-title">
                                            <h6>
                                               {{__('frontend.most_popular')}}
                                            </h6>
                                        </div>
                                        <div class="blogBox-wrap">
                                            <div class="img-box mb-3">
                                                <img class="img-fluid" src="{{$newsDetails->image_url}}" alt="">
                                            </div>
                                            <div class="blogTitle">
                                                <h6>
                                                    {{ucwords($newsDetails->title)}}
                                                </h6>
                                            </div>

                                            <ul class="bioData-blog mb-3">
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        {{ convertDateTimeFormat($newsDetails->created_at, 'monthformat') }}
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="latestBlog-gridList">
                                                <ul class="latestBlog-gridList-box">
                                                    @foreach($latestNews as $key=>$news)
                                                    <li class="latestBlog-gridList-box-link">
                                                        <a class="latestBlog-gridList-box-link-tab" href="{{route('blog-detail', $news->slug)}}">
                                                            <div class="rightBox">
                                                                <div class="blogTitle">
                                                                    <h6>
                                                                        {{ucwords($news->title)}}
                                                                    </h6>
                                                                </div>
                                                                <ul class="bioData-blog">
                                                                    <li class="bioData-blog-link">
                                                                        <span>
                                                                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            {{ convertDateTimeFormat($news->created_at, 'monthformat') }}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    @endif
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $(".videos-container video").each(function(index, video) {
            video.addEventListener("loadedmetadata", function() {
                var duration = video.duration;
                var durationString = formatDuration(duration);
                $(this).next(".meta").html("<p>Video " + (index + 1) + ": " + durationString + "</p>")
            });
        });
    });

    function formatDuration(seconds) {
        var date = new Date(null);
        date.setSeconds(seconds);
        return date.toISOString().substr(11, 8);
    }
</script>
<script>
    // video play pause on hover
    var figure = $(".video-main").hover(hoverVideo, hideVideo);

    function hoverVideo(e) {
        $('video', this).get(0).play();
    }

    function hideVideo(e) {
        $('video', this).get(0).pause();
    }
    // scroll bar on click arrow
    (function($) {
        $(".cata-sub-nav").on('scroll', function() {
            $val = $(this).scrollLeft();
            if ($(this).scrollLeft() + $(this).innerWidth() >= $(this)[0].scrollWidth) {
                $(".nav-next").hide();
            } else {
                $(".nav-next").show();
            }
            if ($val == 0) {
                $(".nav-prev").hide();
            } else {
                $(".nav-prev").show();
            }
        });
        $(".nav-next").on("click", function() {
            $(".cata-sub-nav").animate({
                scrollLeft: '+=100'
            }, 300);
        });
        $(".nav-prev").on("click", function() {
            $(".cata-sub-nav").animate({
                scrollLeft: '-=100'
            }, 300);
        });

    })(jQuery);
    // filter on click button
    $(".filter-button").click(function() {
        $(this).addClass('fill-btn').siblings().removeClass('fill-btn');
        var value = $(this).attr('data-filter');
        if (value == "all") {
            $('.filter').show('1000');
        } else {
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');
        }
    });
</script>
@endpush