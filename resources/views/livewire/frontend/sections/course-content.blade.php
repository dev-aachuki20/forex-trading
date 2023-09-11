<div>
    @if($courseContent)
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
                            @foreach($courseContent as $key => $content)
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#audition-{{$key}}" aria-expanded="true" aria-controls="audition-{{$key}}">{{ucwords($content->name)}}
                                    <span class="lectures-name">{{$content->lecture->count()}} lectures <span class="time-lect">01 : 10 min</span></span>
                                </a>
                                <div id="audition-{{$key}}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="course-content-videos">
                                                    <ul>
                                                        @foreach($content->lecture as $lecture)
                                                        <li>
                                                            <div class="course-content-name">
                                                                <h6><a href="learn-forex-trading-video.html">1.1 {{$lecture->name}}</a></h6>
                                                                <p>06:34</p>
                                                            </div>
                                                            <div class="course-content-link">
                                                                <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
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
                            <!-- <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-2" aria-expanded="false" aria-controls="audition-2">Forex Acronyms and Jargon
                                    <span class="lectures-name">10 lectures <span class="time-lect">01 : 10 min</span></span>
                                </a>
                                <div id="audition-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="course-content-videos">
                                                    <ul>
                                                        <li>
                                                            <div class="course-content-name">
                                                                <h6><a href="learn-forex-trading-video.html">1.1 Disclaimer</a></h6>
                                                                <p>06:34</p>
                                                            </div>
                                                            <div class="course-content-link">
                                                                <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="course-content-name">
                                                                <h6><a href="learn-forex-trading-video.html">1.2 What is Forex?</a></h6>
                                                                <p>12:25</p>
                                                            </div>
                                                            <div class="course-content-link">
                                                                <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div> -->

                        </div>
                    </div>
                    <div class="button-group justify-content-center">
                        <a href="{{ $sectionDetail ? ucwords($sectionDetail->link_one) : '' }}" class="custom-btn fill-btn">{{ $sectionDetail ? ucwords($sectionDetail->button_one) : '' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>