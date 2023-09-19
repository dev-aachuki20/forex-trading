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

    <!-- School of Forex Trading -->
    @livewire('frontend.sections.school-of-forex-trading', ['localeid'=>$localeid])

    <!-- track your progress -->
    @livewire('frontend.sections.track-your-progress', ['localeid'=>$localeid])

    <div class="google-ads">
        <a href="#">
            <img src="{{asset('images/google-adds.jpg')}}" alt="google-adds">
        </a>
    </div>

    <!-- what you'll learn -->
    @livewire('frontend.sections.what-you-will-learn', ['localeid'=>$localeid])


    <!-- course content start -->
    <section class="course-content-sec padding-tb-120 bg-white-to-offblue-gradient-color">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-sm-12">
            <div class="section-head text-center">
              <h2>Course Content</h2>
              <div class="discription">
                <p>Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10 col-sm-12">
            <div class="faq-accordion mani-faq-page">
              <div class="accordion" id="accordionExample1">
                <div class="accordion-item">
                  <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#audition-1" aria-expanded="true" aria-controls="audition-1">Forex Basics
                    <span class="lectures-name">12 lectures <span class="time-lect">01 : 10 min</span></span>
                  </a>
                  <div id="audition-1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample1">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
                <div class="accordion-item">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
                <div class="accordion-item">
                  <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-3" aria-expanded="false" aria-controls="audition-3">Forex Analysis
                    <span class="lectures-name">10 lectures <span class="time-lect">01 : 10 min</span></span>
                  </a>
                  <div id="audition-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
                <div class="accordion-item">
                  <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-4" aria-expanded="false" aria-controls="audition-4">Fundamental Analysis
                    <span class="lectures-name">10 lectures <span class="time-lect">01 : 10 min</span></span>
                  </a>
                  <div id="audition-4" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
                <div class="accordion-item">
                  <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-5" aria-expanded="false" aria-controls="audition-5">Technical Analysis
                    <span class="lectures-name">10 lectures <span class="time-lect">01 : 10 min</span></span>
                  </a>
                  <div id="audition-5" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
                <div class="accordion-item">
                  <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-6" aria-expanded="false" aria-controls="audition-6">MetaTrader 4
                    <span class="lectures-name">10 lectures <span class="time-lect">01 : 10 min</span></span>
                  </a>
                  <div id="audition-6" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
                <div class="accordion-item">
                  <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-7" aria-expanded="false" aria-controls="audition-7">Calculating Risks the SMART Way
                    <span class="lectures-name">10 lectures <span class="time-lect">01 : 10 min</span></span>
                  </a>
                  <div id="audition-7" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
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
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.3 Before You Start</a></h6>
                                  <p>10:15</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.4 Practice Demo Account</a></h6>
                                  <p>02:36</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.5 Players on the Forex Market</a></h6>
                                  <p>07:22</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.6 Bulls & Bears</a></h6>
                                  <p>12:34</p>
                                </div>
                                <div class="course-content-link">
                                  <a href="javascript:void(0);" class="custom-btn fill-btn" data-bs-toggle="modal" data-bs-target="#preview-video">Preview</a>
                                </div>
                              </li>
                              <li>
                                <div class="course-content-name">
                                  <h6><a href="learn-forex-trading-video.html">1.7 Bulls & Bears</a></h6>
                                  <p>5 questions</p>
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
                </div>
              </div>
            </div>
            <div class="button-group justify-content-center">
              <a href="#" class="custom-btn fill-btn">View More</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="google-ads">
      <a href="#">
        <img src="images/google-adds-1.jpg" alt="google-adds">
      </a>
    </div>
    <section class="how-trade-forex-sec padding-tb-120 bg-white">
      <div class="container">
        <div class="row ">
          <div class="col-lg-8 col-sm-12">
            <div class="section-head text-start">
              <h2>How Do You Trade Forex?</h2>
              <div class="discription">
                <p>Think the stock market is huge? Think again. Learn about the LARGEST financial market in the world and how to trade in it.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="how-trade-forex-list">
              <div class="how-trade-forex-box">
                <div class="how-trade-forex-img">
                  <img src="images/trade-forex/1.jpg" alt="trade-forex">
                </div>
                <div class="how-trade-forex-text">
                  <h3>The Complete Foundation FOREX Trading Course</h3>
                  <div class="total-users-read">
                    <span>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99996 2C6.37996 2 4.24996 4.13 4.24996 6.75C4.24996 9.32 6.25996 11.4 8.87996 11.49C8.95996 11.48 9.03996 11.48 9.09996 11.49H9.16996C10.3993 11.449 11.5645 10.9315 12.4192 10.0469C13.274 9.16234 13.7512 7.98004 13.75 6.75C13.75 4.13 11.62 2 8.99996 2ZM14.08 14.149C11.29 12.289 6.73996 12.289 3.92996 14.149C2.65996 14.999 1.95996 16.149 1.95996 17.379C1.95996 18.609 2.65996 19.749 3.91996 20.589C5.31996 21.529 7.15996 21.999 8.99996 21.999C10.84 21.999 12.68 21.529 14.08 20.589C15.34 19.739 16.04 18.599 16.04 17.359C16.03 16.129 15.34 14.989 14.08 14.149ZM19.99 7.338C20.15 9.278 18.77 10.978 16.86 11.208H16.81C16.75 11.208 16.69 11.208 16.64 11.228C15.67 11.278 14.78 10.968 14.11 10.398C15.14 9.478 15.73 8.098 15.61 6.598C15.5413 5.818 15.2765 5.06806 14.84 4.418C15.3639 4.16308 15.9421 4.03947 16.5245 4.05782C17.1069 4.07618 17.6761 4.23595 18.183 4.52335C18.6899 4.81076 19.1193 5.21717 19.4341 5.70753C19.7489 6.19789 19.9397 6.75747 19.99 7.338Z" fill="#5D6F7D"/>
                        <path d="M21.9883 16.59C21.9083 17.56 21.2883 18.4 20.2483 18.97C19.2483 19.52 17.9883 19.78 16.7383 19.75C17.4583 19.1 17.8783 18.29 17.9583 17.43C18.0583 16.19 17.4683 15 16.2883 14.05C15.6183 13.52 14.8383 13.1 13.9883 12.79C16.1983 12.15 18.9783 12.58 20.6883 13.96C21.6083 14.7 22.0783 15.63 21.9883 16.59Z" fill="#5D6F7D"/>
                      </svg> 50,005
                    </span>7.5 Total Hours, Updated 04/2023
                  </div>
                  <div class="discription">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>
                  </div>
                </div>
              </div>
              <div class="how-trade-forex-box">
                <div class="how-trade-forex-img">
                  <img src="images/trade-forex/2.jpg" alt="trade-forex">
                </div>
                <div class="how-trade-forex-text">
                  <h3>The Complete FOREX Trading Course with BraveFx (2023)</h3>
                  <div class="total-users-read">
                    <span>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99996 2C6.37996 2 4.24996 4.13 4.24996 6.75C4.24996 9.32 6.25996 11.4 8.87996 11.49C8.95996 11.48 9.03996 11.48 9.09996 11.49H9.16996C10.3993 11.449 11.5645 10.9315 12.4192 10.0469C13.274 9.16234 13.7512 7.98004 13.75 6.75C13.75 4.13 11.62 2 8.99996 2ZM14.08 14.149C11.29 12.289 6.73996 12.289 3.92996 14.149C2.65996 14.999 1.95996 16.149 1.95996 17.379C1.95996 18.609 2.65996 19.749 3.91996 20.589C5.31996 21.529 7.15996 21.999 8.99996 21.999C10.84 21.999 12.68 21.529 14.08 20.589C15.34 19.739 16.04 18.599 16.04 17.359C16.03 16.129 15.34 14.989 14.08 14.149ZM19.99 7.338C20.15 9.278 18.77 10.978 16.86 11.208H16.81C16.75 11.208 16.69 11.208 16.64 11.228C15.67 11.278 14.78 10.968 14.11 10.398C15.14 9.478 15.73 8.098 15.61 6.598C15.5413 5.818 15.2765 5.06806 14.84 4.418C15.3639 4.16308 15.9421 4.03947 16.5245 4.05782C17.1069 4.07618 17.6761 4.23595 18.183 4.52335C18.6899 4.81076 19.1193 5.21717 19.4341 5.70753C19.7489 6.19789 19.9397 6.75747 19.99 7.338Z" fill="#5D6F7D"/>
                        <path d="M21.9883 16.59C21.9083 17.56 21.2883 18.4 20.2483 18.97C19.2483 19.52 17.9883 19.78 16.7383 19.75C17.4583 19.1 17.8783 18.29 17.9583 17.43C18.0583 16.19 17.4683 15 16.2883 14.05C15.6183 13.52 14.8383 13.1 13.9883 12.79C16.1983 12.15 18.9783 12.58 20.6883 13.96C21.6083 14.7 22.0783 15.63 21.9883 16.59Z" fill="#5D6F7D"/>
                      </svg> 50,005
                    </span>7.5 Total Hours, Updated 04/2023
                  </div>
                  <div class="discription">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>
                  </div>
                </div>
              </div>
              <div class="how-trade-forex-box">
                <div class="how-trade-forex-img">
                  <img src="images/trade-forex/3.jpg" alt="trade-forex">
                </div>
                <div class="how-trade-forex-text">
                  <h3>Forex MetaTrader 4: Master  MT4 Like A Pro Forex Trader</h3>
                  <div class="total-users-read">
                    <span>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99996 2C6.37996 2 4.24996 4.13 4.24996 6.75C4.24996 9.32 6.25996 11.4 8.87996 11.49C8.95996 11.48 9.03996 11.48 9.09996 11.49H9.16996C10.3993 11.449 11.5645 10.9315 12.4192 10.0469C13.274 9.16234 13.7512 7.98004 13.75 6.75C13.75 4.13 11.62 2 8.99996 2ZM14.08 14.149C11.29 12.289 6.73996 12.289 3.92996 14.149C2.65996 14.999 1.95996 16.149 1.95996 17.379C1.95996 18.609 2.65996 19.749 3.91996 20.589C5.31996 21.529 7.15996 21.999 8.99996 21.999C10.84 21.999 12.68 21.529 14.08 20.589C15.34 19.739 16.04 18.599 16.04 17.359C16.03 16.129 15.34 14.989 14.08 14.149ZM19.99 7.338C20.15 9.278 18.77 10.978 16.86 11.208H16.81C16.75 11.208 16.69 11.208 16.64 11.228C15.67 11.278 14.78 10.968 14.11 10.398C15.14 9.478 15.73 8.098 15.61 6.598C15.5413 5.818 15.2765 5.06806 14.84 4.418C15.3639 4.16308 15.9421 4.03947 16.5245 4.05782C17.1069 4.07618 17.6761 4.23595 18.183 4.52335C18.6899 4.81076 19.1193 5.21717 19.4341 5.70753C19.7489 6.19789 19.9397 6.75747 19.99 7.338Z" fill="#5D6F7D"/>
                        <path d="M21.9883 16.59C21.9083 17.56 21.2883 18.4 20.2483 18.97C19.2483 19.52 17.9883 19.78 16.7383 19.75C17.4583 19.1 17.8783 18.29 17.9583 17.43C18.0583 16.19 17.4683 15 16.2883 14.05C15.6183 13.52 14.8383 13.1 13.9883 12.79C16.1983 12.15 18.9783 12.58 20.6883 13.96C21.6083 14.7 22.0783 15.63 21.9883 16.59Z" fill="#5D6F7D"/>
                      </svg> 50,005
                    </span>7.5 Total Hours, Updated 04/2023
                  </div>
                  <div class="discription">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>
                  </div>
                </div>
              </div>
              <div class="how-trade-forex-box">
                <div class="how-trade-forex-img">
                  <img src="images/trade-forex/4.jpg" alt="trade-forex">
                </div>
                <div class="how-trade-forex-text">
                  <h3>The Complete Foundation FOREX Trading Course</h3>
                  <div class="total-users-read">
                    <span>
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.99996 2C6.37996 2 4.24996 4.13 4.24996 6.75C4.24996 9.32 6.25996 11.4 8.87996 11.49C8.95996 11.48 9.03996 11.48 9.09996 11.49H9.16996C10.3993 11.449 11.5645 10.9315 12.4192 10.0469C13.274 9.16234 13.7512 7.98004 13.75 6.75C13.75 4.13 11.62 2 8.99996 2ZM14.08 14.149C11.29 12.289 6.73996 12.289 3.92996 14.149C2.65996 14.999 1.95996 16.149 1.95996 17.379C1.95996 18.609 2.65996 19.749 3.91996 20.589C5.31996 21.529 7.15996 21.999 8.99996 21.999C10.84 21.999 12.68 21.529 14.08 20.589C15.34 19.739 16.04 18.599 16.04 17.359C16.03 16.129 15.34 14.989 14.08 14.149ZM19.99 7.338C20.15 9.278 18.77 10.978 16.86 11.208H16.81C16.75 11.208 16.69 11.208 16.64 11.228C15.67 11.278 14.78 10.968 14.11 10.398C15.14 9.478 15.73 8.098 15.61 6.598C15.5413 5.818 15.2765 5.06806 14.84 4.418C15.3639 4.16308 15.9421 4.03947 16.5245 4.05782C17.1069 4.07618 17.6761 4.23595 18.183 4.52335C18.6899 4.81076 19.1193 5.21717 19.4341 5.70753C19.7489 6.19789 19.9397 6.75747 19.99 7.338Z" fill="#5D6F7D"/>
                        <path d="M21.9883 16.59C21.9083 17.56 21.2883 18.4 20.2483 18.97C19.2483 19.52 17.9883 19.78 16.7383 19.75C17.4583 19.1 17.8783 18.29 17.9583 17.43C18.0583 16.19 17.4683 15 16.2883 14.05C15.6183 13.52 14.8383 13.1 13.9883 12.79C16.1983 12.15 18.9783 12.58 20.6883 13.96C21.6083 14.7 22.0783 15.63 21.9883 16.59Z" fill="#5D6F7D"/>
                      </svg> 50,005
                    </span>7.5 Total Hours, Updated 04/2023
                  </div>
                  <div class="discription">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="button-group justify-content-center">
              <a href="#" class="custom-btn fill-btn">Show More</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- course start -->
    @livewire('frontend.sections.course', ['localeid'=>$localeid])

    <div class="modal fade preview-video-popup" id="preview-video" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-head">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="preview-video-outer">
                        <div class="preview-video-main">
                            <video width="560" height="315" controls="">
                                <source src="video/video.mp4" type="video/mp4">
                                <source src="video/video.ogg" type="video/ogg">
                            </video>
                        </div>
                        <div class="preview-video-details">
                            <p>1.2 What is Forex?</p>
                            <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has</h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>
    jQuery(document).ready(function($) {
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('#stats_id').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                var i = 1;
                runAllGauges();
                a = 1;
            }

        });
    });

    function runAllGauges() {
        var gauges = $('.gauge-cont');
        $.each(gauges, function(i, v) {
            var self = this;
            setTimeout(function() {
                setGauge(self);
            }, i * 700);
        });
    }

    function resetAllGauges() {
        var gauges = $('.gauge-cont').get().reverse();
        $.each(gauges, function(i, v) {
            var self = this;
            setTimeout(function() {
                resetGauge(self);
            }, i * 700);
        });
    }

    function resetGauge(gauge) {
        var spinner = $(gauge).find('.spinner');
        var pointer = $(gauge).find('.pointer');
        $(spinner).attr({
            style: 'transform: rotate(0deg)'
        });
        $(pointer).attr({
            style: 'transform: rotate(-90deg)'
        });
    }

    function setGauge(gauge) {
        var percentage = $(gauge).data('percentage') / 100;
        var degrees = 180 * percentage;
        var pointerDegrees = degrees - 90;
        var spinner = $(gauge).find('.spinner');
        var pointer = $(gauge).find('.pointer');
        $(spinner).attr({
            style: 'transform: rotate(' + degrees + 'deg)'
        });
        $(pointer).attr({
            style: 'transform: rotate(' + pointerDegrees + 'deg)'
        });
    }
</script>
@endpush