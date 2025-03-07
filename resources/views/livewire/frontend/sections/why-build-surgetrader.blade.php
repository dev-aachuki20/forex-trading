<section class="all-started padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12 align-self-center">
                <div class="section-head">
                    <h2 class="mb-30"> {!! $sectionDetail ? ucwords($sectionDetail->title) : 'Why Build
                        Surgetrader? Find Out
                        How It All Started' !!}
                    </h2>
                    <div class="discription">
                    <blockquote>
                        {!! $sectionDetail ? ucfirst($sectionDetail->description) : 'SurgeTrader is looking for long term relationships with great traders. We set out to create an experience for our traders to feel valued and want to set the new standard in the trading world.' !!}
                    </blockquote>
                    </div>
                    <div class="profile-tweet">
                        <ul>
                            <li><img src="{{ asset('images/meet-our-founder/image-1.png') }}" alt="image-1"></li>
                            <li><img src="{{ asset('images/meet-our-founder/image-2.png') }}" alt="image-2"></li>
                        </ul>
                        <a class="custom-btn fill-btn" href="javascript:void(0)">{{ $allKeysProvider['tweet'] ?? 'Tweet'}}
                        </a>
                    </div>
                    <div class="button-group">
                        <a class="custom-btn outline-color-azul" href="javascript:void(0)" id="joinMyTeam-why-build-section">{{ $allKeysProvider['join_my_team'] ?? 'Join My Team'}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="becoming-rules-img">

                    <div class="box-outer">
                        <div class="box-video">
                            <div class="bg-video" style="background-image: url({{ $sectionDetail->image_url ? $sectionDetail->image_url : 'images/becoming-img.jpg' }});">
                                <div class="bt-play">
                                    <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M41.7108 27.5123L20.4197 13.9199V41.1046L41.7108 27.5123Z" fill="white" />
                                        <path d="M22.9631 53.1667C22.8666 53.1667 22.77 53.1581 22.6722 53.1398C20.0787 52.6546 17.5817 51.7783 15.2509 50.5365C12.9715 49.3216 10.8863 47.7767 9.05423 45.9458C7.22212 44.1137 5.67723 42.0286 4.46356 39.7491C3.22178 37.4184 2.34667 34.9214 1.86023 32.3278C1.70012 31.4735 2.26356 30.6509 3.11789 30.4908C3.97223 30.3307 4.79478 30.8941 4.9549 31.7485C6.68067 40.9665 14.0323 48.3194 23.2503 50.0439C24.1047 50.204 24.6681 51.0266 24.508 51.8809C24.3675 52.6387 23.7062 53.1667 22.9631 53.1667Z" fill="white" />
                                        <path d="M32.0369 53.1667C31.2938 53.1667 30.6326 52.6387 30.4908 51.8821C30.3307 51.0278 30.8941 50.2053 31.7484 50.0451C40.9665 48.3194 48.3193 40.9677 50.0439 31.7497C50.204 30.8954 51.0266 30.3319 51.8809 30.492C52.7352 30.6521 53.2987 31.4747 53.1386 32.329C52.6533 34.9226 51.777 37.4196 50.5352 39.7504C49.3203 42.0298 47.7754 44.1149 45.9446 45.947C44.1124 47.7791 42.0273 49.324 39.7479 50.5377C37.4171 51.7795 34.9201 52.6546 32.3266 53.141C32.23 53.1581 32.1322 53.1667 32.0369 53.1667Z" fill="white" />
                                        <path d="M3.40985 24.5361C3.3133 24.5361 3.21674 24.5275 3.11896 24.5092C2.26463 24.3491 1.70119 23.5265 1.8613 22.6722C2.34652 20.0786 3.22285 17.5816 4.46463 15.2509C5.67952 12.9714 7.22441 10.8863 9.0553 9.0542C10.8874 7.22209 12.9725 5.6772 15.252 4.46353C17.5827 3.22175 20.0797 2.34664 22.6733 1.8602C23.5276 1.70009 24.3502 2.26353 24.5103 3.11786C24.6704 3.9722 24.107 4.79475 23.2526 4.95486C14.0334 6.68064 6.68052 14.0335 4.95596 23.2515C4.81419 24.0081 4.15296 24.5361 3.40985 24.5361Z" fill="white" />
                                        <path d="M51.59 24.5361C50.8469 24.5361 50.1857 24.0081 50.0439 23.2515C48.3181 14.0335 40.9664 6.68064 31.7484 4.95609C30.8941 4.79597 30.3307 3.97342 30.4908 3.11909C30.6509 2.26475 31.4734 1.70131 32.3278 1.86142C34.9213 2.34664 37.4183 3.22297 39.7491 4.46475C42.0286 5.67964 44.1137 7.22453 45.9458 9.05542C47.7779 10.8875 49.3228 12.9726 50.5364 15.2521C51.7782 17.5829 52.6533 20.0799 53.1398 22.6734C53.2999 23.5278 52.7364 24.3503 51.8821 24.5104C51.7843 24.5275 51.6866 24.5361 51.59 24.5361Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                            <div class="video-container">
                                @if($sectionDetail->video)

                                <video id="why-build-trader-video-{{$sectionDetail->id}}" width="560" height="315" controls preload="none" poster="{{ $sectionDetail->image_url ? $sectionDetail->image_url : config('constants.section_image_default.our_company_work') }}">
                                    <source src="{{$sectionDetail->video_url}}" type="video/{{ $sectionDetail->video->extension }}">
                                    <source src="{{$sectionDetail->video_url}}" type="video/ogg">
                                </video>

                                @else
                                <video width="560" height="315" controls>
                                    <source src="video/video.mp4" type="video/mp4">
                                    <source src="video/video.ogg" type="video/ogg">
                                </video>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>