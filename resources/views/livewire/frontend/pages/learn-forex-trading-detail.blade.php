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
                                    <div class="tab-pane fade show {{ $activeLecture->id  == $displayActiveId ? 'active' : ''}}" id="v-pills-home" role="tabpanel" tabindex="0">
                                        <video id="displayActiveVideo" width="560" height="315" controls controlsList="nodownload" poster="{{$activeLecture->lecture_image_url}}">
                                            <source src="{{$activeLecture->lecture_video_url ?? ''}}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="video-detail-share d-block w-100">
                            <div class="row row-gap-md-3">
                                <div class="col-12">
                                    <h5>{{$activeLecture ? ucfirst($activeLecture->name) : ''}}</h5>
                                </div>
                                <div class="col-12">
                                    <ul class="justify-content-md-end">
                                        <li><a href="javascript:void(0);" wire:click.prevent="likeEvent('{{$activeLecture->id}}')"> <img src="{{asset('images/trading-video/like.svg')}}" alt="like">{{ $totalLikes ?? 0 }}</a></li>
                                        <li><a href="javascript:void(0);" wire:click.prevent="dislikeEvent('{{$activeLecture->id}}')" > <img src="{{asset('images/trading-video/dislike.svg')}}" alt="dislike">{{ $totalDislike ?? 0 }}</a></li>
                                        <li>
                                            <a href="javascript:void(0);" wire:click="socialMediaModal()">
                                                <img src="{{asset('images/trading-video/share.svg')}}" alt="share">share
                                            </a>
                                        </li>
                                        <li><img src="{{asset('images/trading-video/view.svg')}}" alt="view">{{$totalViews ?? 0}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="video-detail-discription">
                            <div class="discription">
                                {!! $activeLecture ? ucfirst($activeLecture->description) : '' !!}
                            </div>
                            <div class="teacher-intro">
                                <div class="teacher-img">
                                    <img src="{{asset('admin/jpg/user.png')}}" alt="teacher-img">
                                </div>
                                <div class="teacher-discription">
                                    <h6>{{$courseCreator ? ucwords($courseCreator->name) : ''}}</h6>
                                    <p>{{$courseCreator ? ucwords($courseCreator->about_admin) : ''}}</p>
                                </div>
                            </div>
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
                                    @foreach($courseLectureList as $list)
                                    <button wire:key="{{$list->id}}" wire:click.prevent="changeVideo('{{$list->id}}')" class="nav-link {{$list->id == $activeLecture->id ? 'active' : ''}}">
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
    // var figure = $(".video-main").hover(hoverVideo, hideVideo);

    // function hoverVideo(e) {
    //     $('video', this).get(0).play();
    // }

    // function hideVideo(e) {
    //     $('video', this).get(0).pause();
    // }

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

    
    document.addEventListener('like-event', function(event) {
        
        var req = event.detail[0];
        var lecture_id = req.lecture_id;

        var disliked = localStorage.getItem('lecture-dislike-'+lecture_id);
        if (disliked !== null && disliked != 0) {

            let totalDislike = req.totalDislikes;

            totalDislike = parseInt(totalDislike) - 1;

            // console.log('disliked',totalDislike);
           
            if(totalDislike < 0){
                totalDislike = 0;
            }
           
            localStorage.setItem('lecture-dislike-'+lecture_id, totalDislike);
            @this.dispatch('dislike', {value:totalDislike});
            
        }

        var elementName = 'lecture-like-'+lecture_id;
        var myItem = localStorage.getItem(elementName);
        var totalLikes = req.totalLikes;
        
        if (myItem !== null && myItem != 0) {

            // totalLikes = parseInt(myItem) - 1; 
            // localStorage.setItem(elementName, totalLikes);
            // @this.dispatch('like', {value:totalLikes});

        } else {

            // console.log(elementName,totalLikes);

            totalLikes = parseInt(totalLikes) + 1; 
            localStorage.setItem(elementName, totalLikes);
            @this.dispatch('like', {value:totalLikes});

        }

    });

    document.addEventListener('dislike-event', function(event) {
        
        var req = event.detail[0];
        var lectureId = req.lecture_id;

        var liked = localStorage.getItem('lecture-like-'+lectureId);
        if (liked !== null && liked != 0) {
            let totalLike = req.totalLikes;

            // console.log('totalLikes',totalLike);

            totalLike = parseInt(totalLike) - 1;

            // console.log('liked',totalLike);

            if(totalLike < 0){
                totalLike = 0;
            }
           
            localStorage.setItem('lecture-like-'+lectureId, totalLike);
            @this.dispatch('like', {value:totalLike});
            
        }

        var elementName = 'lecture-dislike-'+lectureId;
        var myItem = localStorage.getItem(elementName);
        var totalDislike = req.totalDislikes;
        
        if (myItem !== null && myItem != 0) {

            // totalDislike = parseInt(myItem) - 1; 
            // localStorage.setItem(elementName, totalDislike);
            // @this.dispatch('dislike', {value:totalDislike});

        } else {

            totalDislike = parseInt(totalDislike) + 1; 
            localStorage.setItem(elementName, totalDislike);
            @this.dispatch('dislike', {value:totalDislike});

        }


    });

</script>

@include('partials.frontend.share-social-media')

@endpush