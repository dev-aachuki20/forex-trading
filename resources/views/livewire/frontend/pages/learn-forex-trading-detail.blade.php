<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
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

    <section class="bg-white video-details-section padding-tb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2 class="fw-700">{{$courseData ? ucfirst($courseData->name) : ''}}</h2>
                        <div class="discription mb-0">
                            {!! $courseData ? ucfirst($courseData->description) : '' !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 align-self-end">
                    <div class="blog-filter featured-filter">
                        <form class="d-flex" wire:submit.prevent="submitSearch">

                            <div class="form-group-row d-flex">
                                <div class="form-group">
                                    <input type="text" wire:model="searchLecture" placeholder="{{__('cruds.search')}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group-search">
                                <button class="search-btn custom-btn fill-btn">
                                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M11.8008 4.06641H17.2008M11.8008 7.06095H14.5008" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M18.1 10.555C18.1 15.7954 14.275 20.0377 9.55 20.0377C4.825 20.0377 1 15.7954 1 10.555C1 5.31454 4.825 1.07227 9.55 1.07227" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.4" d="M18.9992 21.0335L17.1992 19.0371" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg> {{__('frontend.search')}}</button>
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
                    <div class="col-lg-8 col-sm-12">
                        <div class="video-detail-video">
                            <div class="video-detail-video">
                                <div class="tab-content">
                                    @if ($activeLecture && $activeLecture->id)
                                    <div class="tab-pane fade show {{ $activeLecture->id  == $displayActiveId ? 'active' : ''}}" id="v-pills-home" role="tabpanel" tabindex="0">
                                        <video id="displayActiveVideo" width="100%"  controls controlsList="nodownload" poster="{{$activeLecture->lecture_image_url}}">
                                            <source src="{{$activeLecture->lecture_video_url ?? ''}}" type="video/mp4">
                                        </video>
                                    </div>
                                    @else
                                    <p>No active lecture available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- <div class="video-detail-share">
                        <h5>Lorem ipsum dolor sit amet.</h5>
                            <ul>
                            <li><a href="javascript:void(0);"> <img src="images/trading-video/like.svg" alt="like">1.7 K</a></li>
                            <li><a href="javascript:void(0);"> <img src="images/trading-video/dislike.svg" alt="dislike">632</a></li>
                            <li>
                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#share-social">
                                <img src="images/trading-video/share.svg" alt="share">share
                                </a>
                            </li>
                            <li><img src="images/trading-video/view.svg" alt="view">576,969</li>
                            </ul>
                        </div> -->
                        <div class="video-detail-share">
                            <h5>{{$activeLecture ? ucfirst($activeLecture->name) : ''}}</h5>

                                @if ($activeLecture && $activeLecture->id)
                               
                                    @php

                                    $isLikeActive = isset($activeLike[$activeLecture->id]) ? $activeLike[$activeLecture->id] : false;

                                    $isDislikeActive = isset($activeDislike[$activeLecture->id]) ? $activeDislike[$activeLecture->id] : false;

                                    @endphp
                                    <ul>
                                        <li><a href="javascript:void(0);" class="like_btn {{$isLikeActive ? 'active' : ''}}" wire:click.prevent="likeEvent('{{$activeLecture->id}}')">

                                                <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.77 7H11.54L13.06 2.06C13.38 1.03 12.54 0 11.38 0C10.8 0 10.24 0.24 9.86 0.65L4 7H0V17H4H5H14.43C15.49 17 16.41 16.33 16.62 15.39L17.96 9.39C18.23 8.15 17.18 7 15.77 7ZM4 16H1V8H4V16ZM16.98 9.17L15.64 15.17C15.54 15.65 15.03 16 14.43 16H5V7.39L10.6 1.33C10.79 1.12 11.08 1 11.38 1C11.64 1 11.88 1.11 12.01 1.3C12.08 1.4 12.16 1.56 12.1 1.77L10.58 6.71L10.18 8H11.53H15.76C16.17 8 16.56 8.17 16.79 8.46C16.92 8.61 17.05 8.86 16.98 9.17Z" fill="#5D6F7D" />
                                                </svg>

                                                {{ $totalLikes ?? 0 }}</a></li>
                                        <li><a href="javascript:void(0);" class="dislike_btn {{$isDislikeActive ? 'active' : ''}}" wire:click.prevent="dislikeEvent('{{$activeLecture->id}}')">

                                                <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.9996 0H13.9996H4.56958C3.49958 0 2.58958 0.67 2.37958 1.61L1.03958 7.61C0.76958 8.85 1.81958 10 3.22958 10H7.45958L5.93958 14.94C5.61958 15.97 6.45958 17 7.61958 17C8.19958 17 8.75958 16.76 9.13958 16.35L14.9996 10H18.9996V0H14.9996ZM8.39958 15.67C8.20958 15.88 7.91958 16 7.61958 16C7.35958 16 7.11958 15.89 6.98958 15.7C6.91958 15.6 6.83958 15.44 6.89958 15.23L8.41958 10.29L8.81958 9H7.45958H3.22958C2.81958 9 2.42958 8.83 2.19958 8.54C2.07958 8.39 1.94958 8.14 2.01958 7.82L3.35958 1.82C3.45958 1.35 3.96958 1 4.56958 1H13.9996V9.61L8.39958 15.67ZM17.9996 9H14.9996V1H17.9996V9Z" fill="#5D6F7D" />
                                                </svg>

                                                {{ $totalDislike ?? 0 }}</a></li>
                                        <li>
                                            <a href="javascript:void(0);" wire:click="socialMediaModal()">
                                                <img src="{{asset('images/trading-video/share.svg')}}" alt="share">share
                                            </a>
                                        </li>
                                        <li><img src="{{asset('images/trading-video/view.svg')}}" alt="view">{{$totalViews ?? 0}}</a></li>
                                    </ul>
                                @endif
                        </div>

                        <div class="video-detail-discription">
                            <div class="discription">
                                {!! $activeLecture ? ucfirst($activeLecture->description) : '' !!}
                            </div>
                            @if($courseCreator)
                            <div class="teacher-intro">
                                <div class="teacher-img">
                                    <img src="{{$courseCreator ? $courseCreator->profile_image_url : asset('admin/jpg/user.png')}}" alt="teacher-img">
                                </div>
                                <div class="teacher-discription">
                                    <h6>{{$courseCreator ? ucwords($courseCreator->name) : ''}}</h6>
                                    <p>{{$courseCreator ? ucwords($courseCreator->about_admin) : ''}}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12">
                        <div class="cata-sub-nav-outer">
                            <div class="cata-sub-nav">
                                <div class="nav-prev arrow" style="display: none;">
                                    < </div>
                                        <ul>
                                            @foreach($allCourse as $courses)
                                            <li wire:click="getCourseLecture({{$courses->id}})" class="custom-btn filter-button {{ isset($courseData) && $courses->id == $courseid ? 'fill-btn' : '' }}">{{$courses->name}}</li>
                                            @endforeach
                                        </ul>
                                        <div class="nav-next arrow" style=""> > </div>
                                </div>
                            </div>

                            <div class="video-container">
                                <div class="nav flex-column nav-pills vidocontainer_innertabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @if(count($courseLectureList) > 0)
                                    @foreach($courseLectureList as $list)
                                    <button wire:key="{{$list->id}}" wire:click.prevent="changeVideo('{{$list->id}}')" class="nav-link {{$activeLecture && $list->id == $activeLecture->id ? 'active' : ''}}">
                                        <div class="filter upcoming">
                                            <div class="video-box-outer">
                                                <div class="video-main">
                                                    <video width="560" height="315" loop="1" muted="" poster="{{$list->lecture_image_url}}">
                                                        <source src="{{$list->lecture_video_url ?? ''}}" type="video/mp4">
                                                    </video>
                                                    <div class="meta"></div>
                                                </div>
                                                <div class="video-details">
                                                    <h5 class="video-title">{{$list ? ucfirst($list->name) : ''}}</h5>
                                                    <ul>
                                                        <li>{{$list->duration ?? '00:00:00'}} Duration</li>
                                                        <li>{{$list->created_at ? $list->created_at->diffForHumans() : ''}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                    @endforeach
                                    @else
                                    <p class="text-center">No lecture found</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    @include('partials.frontend.social-media-popup')

</div>
@push('scripts')
<script type="text/javascript">
    document.addEventListener('loadNewVideo', function(event) {
        changeVideoSource(event.detail);
    });

    function changeVideoSource(newSource) {
        var video = document.getElementById('displayActiveVideo');

        // Find the current source element.
        var source = video.getElementsByTagName('source')[0];

        // Update the source element's "src" attribute.
        source.src = newSource;

        // Load the new video source and start playing it.
        video.load();
        // video.play();
    }
</script>

<!-- <script>
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
</script> -->
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
    // $(".filter-button").click(function() {
    //     $(this).addClass('fill-btn').siblings().removeClass('fill-btn');
    //     var value = $(this).attr('data-filter');
    //     if (value == "all") {
    //         $('.filter').show('1000');
    //     } else {
    //         $(".filter").not('.' + value).hide('3000');
    //         $('.filter').filter('.' + value).show('3000');
    //     }
    // });
    var activelec = "{{$activeLecture ? $activeLecture->id : ''}}";
    if (activelec != '') {
        var likeLocalStorage = localStorage.getItem('lecture-like-' + activelec);
        if (likeLocalStorage !== null) {
            if (likeLocalStorage == 'true') {
                $('.like_btn').addClass('active');
            }
        }
    }



    document.addEventListener('like-event', function(event) {

        var req = event.detail[0];
        var lecture_id = req.lecture_id;

        var disliked = localStorage.getItem('lecture-dislike-' + lecture_id);
        if (disliked !== null && disliked != 'false') {

            localStorage.setItem('lecture-dislike-' + lecture_id, false);
            @this.dispatch('dislike', {
                isDislike: false
            });

        }

        var elementName = 'lecture-like-' + lecture_id;
        var myItem = localStorage.getItem(elementName);

        if (myItem !== null) {

            if (myItem == 'false') {
                localStorage.setItem(elementName, true);
                @this.dispatch('like', {
                    isLike: true
                });

            } else {
                localStorage.setItem(elementName, false);
                @this.dispatch('like', {
                    isLike: false
                });
            }

        } else {
            localStorage.setItem(elementName, true);
            @this.dispatch('like', {
                isLike: true
            });
        }

    });


    if (activelec != '') {
        var dislikeLocalStorage = localStorage.getItem('lecture-dislike-' + activelec);
        if (dislikeLocalStorage !== null) {
            if (dislikeLocalStorage == 'true') {
                $('.dislike_btn').addClass('active');
            }
        }
    }


    document.addEventListener('dislike-event', function(event) {

        var req = event.detail[0];
        var lectureId = req.lecture_id;

        var liked = localStorage.getItem('lecture-like-' + lectureId);
        if (liked !== null && liked != 'false') {
            localStorage.setItem('lecture-like-' + lectureId, false);
            @this.dispatch('like', {
                isLike: false
            });

        }

        var elementName = 'lecture-dislike-' + lectureId;
        var myItem = localStorage.getItem(elementName);

        if (myItem !== null) {

            if (myItem == 'false') {
                localStorage.setItem(elementName, true);
                @this.dispatch('dislike', {
                    isDislike: true
                });

            } else {
                localStorage.setItem(elementName, false);
                @this.dispatch('dislike', {
                    isDislike: false
                });

            }

        } else {
            localStorage.setItem(elementName, true);
            @this.dispatch('dislike', {
                isDislike: true
            });

        }


    });
</script>

@include('partials.frontend.share-social-media')

@endpush