<div>
    <section class="other-page-banner ovarlay-color" style="background-image: url(images/other-pages-bg.jpg);">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">FAQs</h1>
                        <div class="discription text-white body-font-large mb-30">
                            <p>Find the answers to all of your questions about the SurgeTrader funded trader program.</p>
                        </div>
                        <div class="button-group justify-content-center mt-0">
                            <a class="custom-btn fill-btn" href="get-funded.html">Start Trading</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-top-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>How can we Help?</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <!-- the upper div content come here -->
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="faqs-head-name" id="fixed-faq-menu">
                    <ul>
                        @foreach (config('constants.faq_types') as $key=>$faq)
                        <li wire:click="selectCategory('{{ $faq }}','{{$key}}')" class="{{ $selectedCategory === $faq ? 'active' : '' }}"><a href="#surgetrader{{$key}}">{{ ucwords($faq)}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>





    @if($faqsrecords->count()>0)
    @foreach($faqsrecords as $faqType =>$faqsByType)
    <section class="padding-tb-120 faq-sec-1 bg-white" id="surgetrader{{$key}}">
        <div class="container">
            <!-- the upper div2 content come here -->
            <!-- the upper div content come here -->

            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="section-head text-center">
                            <h3>{{ucfirst(config('constants.faq_types')[$faqType])}}</h3>
                            <div class="discription">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample{{$key}}">
                            @foreach($faqsByType as $faqrecord)
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$key}}" aria-expanded="true" aria-controls="collapseOne{{$key}}">{{$faqrecord->question}}</a>
                                <div id="collapseOne{{$key}}" class="accordion-collapse collapse show" data-bs-parent="#accordionExample{{$key}}">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="discription">
                                                    <p>{!! $faqrecord->answer !!}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="faq-videos">
                                                    <div class="box-video">
                                                        <div class="bg-video" style="background-image: url(images/faq-video-img.jpg);">
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
                                                            <video width="560" height="315" controls>
                                                                <source src="video/video.mp4" type="video/mp4">
                                                                <source src="video/video.ogg" type="video/ogg">
                                                            </video>
                                                        </div>
                                                    </div>
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
                </div>
            </div>
        </div>
    </section>
    @endforeach
    @endif





    <!-- <section class="padding-tb-120 bg-white" id="surgetrader{{$key}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="section-head text-center">
                            <h3>Audition Process</h3>
                            <div class="discription">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample1">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-1" aria-expanded="true" aria-controls="audition-1">How do I get started as a funded trader?</a>
                                <div id="audition-1" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-2" aria-expanded="false" aria-controls="audition-2">How long does it take to become a funded trader with SurgeTrader?</a>
                                <div id="audition-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-3" aria-expanded="false" aria-controls="audition-3">What happens once I’ve passed the SurgeTrader Audition?</a>
                                <div id="audition-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-4" aria-expanded="false" aria-controls="audition-4">If I breach the trading rules, do I get a second chance?</a>
                                <div id="audition-4" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-5" aria-expanded="false" aria-controls="audition-5">Is there a discount for a repeat SurgeTrader Audition?</a>
                                <div id="audition-5" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audition-6" aria-expanded="false" aria-controls="audition-6">What capital will I trade as funded trader?</a>
                                <div id="audition-6" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- <section class="padding-tb-120 bg-light-white" id="surgetrader{{$key}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="section-head text-center">
                            <h3>Trading Rules</h3>
                            <div class="discription">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-1" aria-expanded="true" aria-controls="trading-rules-1">what are the trading rules?</a>
                                <div id="trading-rules-1" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-2" aria-expanded="false" aria-controls="trading-rules-2">How do you calculate Daily Loss Limit?</a>
                                <div id="trading-rules-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-3" aria-expanded="false" aria-controls="trading-rules-3">How do you calculate Maximum Trailing Drawdown?</a>
                                <div id="trading-rules-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-4" aria-expanded="false" aria-controls="trading-rules-4">what are the trading hours?</a>
                                <div id="trading-rules-4" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-5" aria-expanded="false" aria-controls="trading-rules-5">How many lots can I trade?</a>
                                <div id="trading-rules-5" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-6" aria-expanded="false" aria-controls="trading-rules-6">Can I trade news?</a>
                                <div id="trading-rules-6" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-7" aria-expanded="false" aria-controls="trading-rules-7">Can I hold stock trades into earnings releases?</a>
                                <div id="trading-rules-7" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-8" aria-expanded="false" aria-controls="trading-rules-8">Do I need to close my positions overnight or weekends?</a>
                                <div id="trading-rules-8" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-9" aria-expanded="false" aria-controls="trading-rules-9">What strategies am I allowed to use?</a>
                                <div id="trading-rules-9" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-10" aria-expanded="false" aria-controls="trading-rules-10">How much leverage do I receive?</a>
                                <div id="trading-rules-10" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-11" aria-expanded="false" aria-controls="trading-rules-11">What happens if my account is inactive for a period of time?</a>
                                <div id="trading-rules-11" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-12" aria-expanded="false" aria-controls="trading-rules-12">What are the Trading Conditions during the Audition?</a>
                                <div id="trading-rules-12" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#trading-rules-13" aria-expanded="false" aria-controls="trading-rules-13">What is slippage and how could it affect my account?</a>
                                <div id="trading-rules-13" class="accordion-collapse collapse" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-tb-120 bg-white-to-offblue-gradient-color" id="surgetrader{{$key}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="section-head text-center">
                            <h3>Funded Accounts</h3>
                            <div class="discription">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample3">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-accounts-1" aria-expanded="true" aria-controls="funded-accounts-1">How should I handle taxes on my profit income?</a>
                                <div id="funded-accounts-1" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-accounts-2" aria-expanded="false" aria-controls="funded-accounts-2">What size account will I manage?</a>
                                <div id="funded-accounts-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-accounts-3" aria-expanded="false" aria-controls="funded-accounts-3">How do I withdraw my profits?</a>
                                <div id="funded-accounts-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-accounts-4" aria-expanded="false" aria-controls="funded-accounts-4">What is the legal relationship between the trader and SurgeTrader?</a>
                                <div id="funded-accounts-4" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-accounts-5" aria-expanded="false" aria-controls="funded-accounts-5">Can I merge live accounts?</a>
                                <div id="funded-accounts-5" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funded-accounts-6" aria-expanded="false" aria-controls="funded-accounts-6">Can I scale my account?</a>
                                <div id="funded-accounts-6" class="accordion-collapse collapse" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>SurgeTrader is a proprietary trading firm that funds traders — enabling them to earn more profits on their trading activity. To become a funded SurgeTrader, traders must first pass an audition to demonstrate their skills and discipline as competent traders. Upon successful completion, traders will receive a funded account of up to $1 million. Traders keep up to 90% of the profit they generate in their funded account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-tb-120 bg-white" id="surgetrader{{$key}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="section-head text-center">
                            <h3>Platform & Dashboard</h3>
                            <div class="discription">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample4">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#platform-dashboard-1" aria-expanded="true" aria-controls="platform-dashboard-1">Which trading platforms can I use for my trading?</a>
                                <div id="platform-dashboard-1" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#platform-dashboard-2" aria-expanded="false" aria-controls="platform-dashboard-2">What information is available on my trading account dashboards?</a>
                                <div id="platform-dashboard-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample4">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="padding-tb-120 bg-light-white" id="surgetrader{{$key}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion mani-faq-page">
                        <div class="section-head text-center">
                            <h3>Orders & Billing</h3>
                            <div class="discription">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                            </div>
                        </div>
                        <div class="accordion" id="accordionExample5">
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-1" aria-expanded="true" aria-controls="orders-billing-1">Are there any other hidden fees or recurring fees?</a>
                                <div id="orders-billing-1" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-2" aria-expanded="false" aria-controls="orders-billing-2">How do I apply for the SurgeTrader Audition?</a>
                                <div id="orders-billing-2" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-3" aria-expanded="false" aria-controls="orders-billing-3">How many accounts can I have?</a>
                                <div id="orders-billing-3" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-4" aria-expanded="false" aria-controls="orders-billing-4">I paid for my SurgeTrader Audition. When will I get the account?</a>
                                <div id="orders-billing-4" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-5" aria-expanded="false" aria-controls="orders-billing-5">What payment methods are available?</a>
                                <div id="orders-billing-5" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-6" aria-expanded="false" aria-controls="orders-billing-6">Why is there a fee for the SurgeTrader Audition?</a>
                                <div id="orders-billing-6" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                            <div class="accordion-item">
                                <a href="javascript:void(0);" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#orders-billing-7" aria-expanded="false" aria-controls="orders-billing-7">Can I purchase an Audition for someone else?</a>
                                <div id="orders-billing-7" class="accordion-collapse collapse" data-bs-parent="#accordionExample5">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12">
                                                <div class="discription">
                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bacdrops"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="why-trade-sec padding-tb-120 bg-white-to-offblue-gradient-color">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center mb-5">
                        <h2>Why Trade with us</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="why-trade-timeline">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="trade-timeline-outer">
                                        <div class="icon">
                                            <img src="images/icons/1.svg" alt="icon">
                                        </div>
                                        <div class="timeline-details">
                                            <h5>Clear & Simple Trading Rules</h5>
                                            <p>Trading rules that are easy to understand and comply with.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="trade-timeline-outer">
                                        <div class="icon">
                                            <img src="images/icons/2.svg" alt="icon">
                                        </div>
                                        <div class="timeline-details">
                                            <h5>One-Time Audition Fee</h5>
                                            <p>No monthly fee. No hidden costs. No recurring costs. Just a one-time investment.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="trade-timeline-outer">
                                        <div class="icon">
                                            <img src="images/icons/3.svg" alt="icon">
                                        </div>
                                        <div class="timeline-details">
                                            <h5>Flexible Trading</h5>
                                            <p>We have no restrictions on trading style. Our program allows for any strategy.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="trade-timeline-outer">
                                        <div class="icon">
                                            <img src="images/icons/4.svg" alt="icon">
                                        </div>
                                        <div class="timeline-details">
                                            <h5>Easy Payout</h5>
                                            <p>Get paid on your profits with a couple clicks — no minimum required.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="trade-timeline-outer">
                                        <div class="icon">
                                            <img src="images/icons/5.svg" alt="icon">
                                        </div>
                                        <div class="timeline-details">
                                            <h5>Quick Customer Service</h5>
                                            <p>Get answers quickly with our responsive customer service channels.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="trade-timeline-outer">
                                        <div class="icon">
                                            <img src="images/icons/6.svg" alt="icon">
                                        </div>
                                        <div class="timeline-details">
                                            <h5>Instant Funding</h5>
                                            <p>Get funded instantly upon successfully passing the SurgeTrader Audition.</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
    $(window).scroll(function() {
        var windscroll = $(window).scrollTop();
        if (windscroll >= 0) {
            $('section').each(function(i) {
                // The number at the end of the next line is how pany pixels you from the top you want it to activate.
                if ($(this).position().top <= windscroll - 0) {
                    $('.faqs-head-name ul li.active').removeClass('active');
                    $('.faqs-head-name ul li').eq(i).addClass('active');
                }
            });

        } else {

            $('nav li.active').removeClass('active');
            $('nav li:first').addClass('active');
        }

    }).scroll();
    // $('.faqs-head-name ul li a').click(function() {
    //     $('.faqs-head-name ul li a').removeClass('active');
    //     $(this).addClass('active');
    //  });
    // video js
    $(".box-video").click(function() {
        $('video source', this)[0].src += "&amp;autoplay=1";
        $(this).addClass('open');
    });


    var startProductBarPos = -1;
    window.onscroll = function() {
        var bar = document.getElementById('fixed-faq-menu');
        if (startProductBarPos < 0) startProductBarPos = findPosY(bar);

        if (pageYOffset > startProductBarPos) {
            bar.style.position = 'fixed';
            bar.style.top = 0;
        } else {
            bar.style.position = 'relative';
        }

    };

    function findPosY(obj) {
        var curtop = 0;
        if (typeof(obj.offsetParent) != 'undefined' && obj.offsetParent) {
            while (obj.offsetParent) {
                curtop += obj.offsetTop;
                obj = obj.offsetParent;
            }
            curtop += obj.offsetTop;
        } else if (obj.y)
            curtop += obj.y;
        return curtop;
    }
</script>
@endpush