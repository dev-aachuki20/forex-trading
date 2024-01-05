<div>
    @if($courses)
    <section class="course-content-sec padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                        <div class="discription">
                            <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="accordion" id="accordionExample1">
                            @foreach($courses as $key => $course)
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button {{ $key != 0 ? 'collapsed' : ''}}" type="button" data-bs-toggle="collapse" data-bs-target="#audition-{{$key}}" aria-expanded="{{ $key != 0 ? 'false' : 'true' }}" aria-controls="audition-{{$key}}">{{ucfirst($course->name)}}
                                    <span class="lectures-name">
                                        @if(count($course->lectures) <= 1) {{ count($course->lectures) }} {{ __('cruds.lecture') }} @else {{ count($course->lectures) }} {{ __('cruds.lectures') }} @endif <span class="time-lect">{{$course->total_duration ? $course->total_duration : "00:00:00"}} {{__('cruds.duration')}}</span>
                                    </span>
                                </a>
                                <div id="audition-{{$key}}" class="accordion-collapse collapse {{ $key == 0 ? 'show' : ''}}" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row innerbodyAccordion">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="course-content-videos">
                                                    <ul>
                                                        @foreach($course->lectures->where('status',1) as $lecture)
                                                        <li>
                                                            <div class="course-content-name">
                                                                <h6><a href="{{route('learn-forex-trading-detail', ['courseid' => $course->id])}}">{{ucfirst($lecture->name)}}</a></h6>
                                                                <p>{{ucfirst($lecture->duration)}}</p>
                                                            </div>
                                                            <div class="course-content-link">
                                                                <a style="cursor: pointer;" wire:click="previewLecture({{ $lecture->id }}, '{{$lecture->lecture_video_url}}')" class="custom-btn fill-btn" wire:loading.attr="disabled">{{__('cruds.preview')}}</a>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="button-group justify-content-center">
              <a href="#" class="custom-btn fill-btn">View More</a>
            </div> --}}
                </div>
            </div>
        </div>
    </section>
    @endif


    <!-- modal -->
    @if($lectureRecord)
    <div wire:key="preview-modal" class="modal fade preview-video-popup" id="preview-video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="preview-video-outer">
                        <div class="preview-video-main">
                            <video width="560" height="315" controls controlsList="nodownload" id="myVideo" poster="{{$lectureImage}}">
                                <source src="{{$lectureRecordVideo}}" type="video/mp4">
                            </video>
                        </div>
                        <div class="preview-video-details">
                            <p>{{ $lectureRecord->course->name ? ucfirst($lectureRecord->course->name) : '' }}</p>
                            <h3>{{ $lectureRecord->name ? ucfirst($lectureRecord->name) : '' }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @push('scripts')
    <script>
        document.addEventListener('openPreviewModal', function(event) {
            $(document).ready(function() {
                $('#preview-video').modal('show');
                var newSource = event.detail[0].lecvideo;
                var video = document.getElementById('myVideo');
                if (video != '') {
                    video.src = newSource;
                    video.load();
                } else {
                    console.error("Video element not found!");
                }
            });

        });
    </script>
    @endpush


</div>