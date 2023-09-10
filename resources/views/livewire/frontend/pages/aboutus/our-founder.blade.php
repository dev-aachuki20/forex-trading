<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color"
        style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn"
                                href="{{ $pageDetail ? $pageDetail->link_one : '' }}">{{ $pageDetail ? ucfirst($pageDetail->button_one) : '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- meet our founder --}}
    @livewire('frontend.sections.meet-our-founder', ['localeid' => $localeid])


    {{-- Why Build Surgetrader? Find Out how It All Started --}}
    @livewire('frontend.sections.why-build-surgetrader', ['localeid' => $localeid])


    {{-- Lorem Ipsum Is Simply Dummy --}}
    <section class="left-text-sec overlay-dark-gradient padding-tb-120"
        style="background-image:url(images/meet-our-founder/bg-img.jpg)">
        <div class="container position-relative z-10">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <div class="section-head text-white">
                        <h2 class="text-white">Lorem Ipsum is simply dummy </h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                the cites of the word in classical literature,</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-white" href="#">Join My Team</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INSTGRAM USER -->
    @livewire('frontend.sections.instgrammember', ['localeid' => $localeid])

    {{-- connect with me on social media --}}
    @livewire('frontend.sections.connect-on-social-media', ['localeid' => $localeid])


    <!--how it works -->
    @livewire('frontend.sections.how-it-works', ['localeid' => $localeid])

    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid' => $localeid])
</div>
