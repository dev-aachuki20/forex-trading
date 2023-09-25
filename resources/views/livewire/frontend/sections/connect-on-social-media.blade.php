<section class="padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Connect With Me On Social' }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever" !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gap-24">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="conatct-outer contact-on-social">
                    <a href="{{ getSetting('instagram') ? getSetting('instagram') : 'javascript:void(0);' }}">
                        <div class="contact-icon-inner d-flex align-items-center">
                            <div class="contact-icon-main">
                                <img src="{{ asset('images/meet-our-founder/instagram.svg') }}" alt="instagram">
                            </div>
                            <div class="contact-text">
                                <h4>Instagram</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="conatct-outer contact-on-social">
                    <a href="{{ getSetting('facebook') ? getSetting('facebook') : 'javascript:void(0);' }}">
                        <div class="contact-icon-inner d-flex align-items-center">
                            <div class="contact-icon-main">
                                <img src="{{ asset('images/meet-our-founder/facebook.svg') }}" alt="facebook">
                            </div>
                            <div class="contact-text">
                                <h4>Facebook</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="conatct-outer contact-on-social">
                    <a href="{{ getSetting('twitter') ? getSetting('twitter') : 'javascript:void(0);' }}">
                        <div class="contact-icon-inner d-flex align-items-center">
                            <div class="contact-icon-main">
                                <img src="{{ asset('images/meet-our-founder/twitter-line.svg') }}" alt="twitter-line">
                            </div>
                            <div class="contact-text">
                                <h4>Twitter</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="conatct-outer contact-on-social">
                    <a href="#">
                        <div class="contact-icon-inner d-flex align-items-center">
                            <div class="contact-icon-main">
                                <img src="{{ asset('images/meet-our-founder/linkedin-line.svg') }}" alt="linkedin-line">
                            </div>
                            <div class="contact-text">
                                <h4>LinkedIn</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>