<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Title' }}</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p> {{ $pageDetail ? ucwords($pageDetail->sub_title) : '' }}</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn" href="{{ $pageDetail ? $pageDetail->link_one : ''}}">{{ $pageDetail ? ucfirst($pageDetail->button_one) : '' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white side-by-side padding-tb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="side-by-side-img">
                        <img src="{{asset('images/fixi-logo.png')}}" alt="fixi-logo">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2>platform</h2>
                        <div class="discription">
                            <p>Get your account and access our proprietary trader portal in under 5 minutes through our leading-edge automation technology. No waiting. No screening. Just SurgeTrading.</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul" href="#">Start Trading</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white-to-offblue-gradient-color side-by-step padding-tb-120 padding-bottom-160">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="section-head">
                        <h2>Accelerate Your Journey to Being a Funded Trader</h2>
                        <div class="discription mb-0">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="side-icons-sec">
                        <div class="side-icons-items">
                            <div class="side-icons-img bg-azul">
                                <img src="{{asset('images/icons/timerpause-white.svg')}}" alt="timerpause-white">
                            </div>
                            <div class="side-icon-text">
                                <h4>Fast</h4>
                                <div class="step-details-dis">
                                    <p>Get immediate access to an account with tight spreads and low commissions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="side-icons-items">
                            <div class="side-icons-img bg-azul">
                                <img src="{{asset('images/icons/monitor.svg')}}" alt="monitor">
                            </div>
                            <div class="side-icon-text">
                                <h4>Dashboard</h4>
                                <div class="step-details-dis">
                                    <p>Track your performance and trading metrics in our trader portal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="side-icons-items">
                            <div class="side-icons-img bg-azul">
                                <img src="{{asset('images/icons/dollarsquare.svg')}}" alt="dollarsquare">
                            </div>
                            <div class="side-icon-text">
                                <h4>Funding</h4>
                                <div class="step-details-dis">
                                    <p>Pass our audition and we’ll give you our money to trade.</p>
                                </div>
                            </div>
                        </div>
                        <div class="side-icons-items">
                            <div class="side-icons-img bg-azul">
                                <img src="{{asset('images/icons/moneysend.svg')}}" alt="moneysend">
                            </div>
                            <div class="side-icon-text">
                                <h4>Profits</h4>
                                <div class="step-details-dis">
                                    <p>Keep up to 90% of the profits you generate off or our capital.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- features -->
    @livewire('frontend.sections.features', ['localeid'=>$localeid])
    <!-- features end -->

    <section class="earn-more-sec padding-top-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="section-head padding-bottom-120">
                        <h2 class="max-w-427">Start trading </h2>
                        <div class="discription">
                            <p>The first step to becoming a professional trader starts here. We have the tools. We have the capital. We need your talent. We want you to be the next SurgeTrader.</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn fill-btn" href="#">Start Trading</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="earn-more-img">
                        <img src="{{asset('images/start-trading.png')}}" alt="start-trading">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>