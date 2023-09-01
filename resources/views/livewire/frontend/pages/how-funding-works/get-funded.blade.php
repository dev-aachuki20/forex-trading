 <div class="outer-inner-container">
     <section class="other-page-banner ovarlay-color" style="background-image: url(images/other-pages-bg.jpg);">
         <div class="container z-10 position-relative">
             <div class="row justify-content-center">
                 <div class="col-lg-8 col-sm-12">
                     <div class="home-banner-text text-center">
                         <h1 class="text-white">Get Funded - Trading Account Options</h1>
                         <div class="discription text-white body-font-large mb-0">
                             <p>Choose the account tier that works for you and start earning more on your trading activity.</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- packages -->
     @livewire('frontend.sections.package', ['localeid'=>$localeid])
     <!-- packages end -->

     <section class="bg-white-to-offblue-gradient-color side-by-side padding-tb-120">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-6 col-sm-12">
                     <div class="side-by-side-img">
                         <img src="{{asset('images/img-1.png')}}" alt="img-1">
                     </div>
                 </div>
                 <div class="col-lg-6 col-sm-12">
                     <div class="section-head">
                         <h2>trading rules & account limits</h2>
                         <div class="discription">
                             <p>We help you focus on executing profitable trades by making the rules and account limits simple and
                                 straightforward.</p>
                         </div>
                         <div class="button-group">
                             <a class="custom-btn outline-color-azul" href="#">View Rules and Limits</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="bg-white side-by-step padding-tb-120 padding-bottom-160">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-6 col-sm-12">
                     <div class="section-head">
                         <h2 class="max-w-427">withdrawing profits</h2>
                         <div class="discription">
                             <p>SurgeTraders can request a withdrawal of profits at any time, but no more frequently than every thirty
                                 days. When a withdrawal is requested, SurgeTrader will also withdraw its share of the profits and your
                                 new highwater equity will be marked down by the total amount of funds withdrawn.</p>
                         </div>
                         <div class="button-group">
                             <a class="custom-btn outline-color-azul" href="#">Start Trading</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-sm-12">
                     <div class="side-icons-sec">
                         <div class="side-icons-items">
                             <div class="side-icons-img bg-azul">
                                 <img src="{{asset('images/icons/favoritechart.svg')}}" alt="favoritechart">
                             </div>
                             <div class="side-icon-text">
                                 <h4>Up to 90% Profit</h4>
                                 <div class="step-details-dis">
                                     <p>You keep up to 90% of the profits you earn.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="side-icons-items">
                             <div class="side-icons-img bg-azul">
                                 <img src="{{asset('images/icons/setting.svg')}}" alt="setting">
                             </div>
                             <div class="side-icon-text">
                                 <h4>Easy</h4>
                                 <div class="step-details-dis">
                                     <p>Withdraw your profits with a few clicks.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="side-icons-items">
                             <div class="side-icons-img bg-azul">
                                 <img src="{{asset('images/icons/shuttle.svg')}}" alt="shuttle">
                             </div>
                             <div class="side-icon-text">
                                 <h4>Fast</h4>
                                 <div class="step-details-dis">
                                     <p>Quick processing of profits into your account.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="side-icons-items">
                             <div class="side-icons-img bg-azul">
                                 <img src="{{asset('images/icons/callcalling.svg')}}" alt="callcalling">
                             </div>
                             <div class="side-icon-text">
                                 <h4>Support</h4>
                                 <div class="step-details-dis">
                                     <p>Responsive support to help with any issue or concern.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section class="earn-more-sec padding-top-120 bg-white-to-offblue-gradient-color">
         <div class="container">
             <div class="row justify-content-between align-items-end">
                 <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="section-head padding-bottom-120">
                         <h2 class="max-w-427">Earn more from your Trading Activity</h2>
                         <div class="discription">
                             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                                 industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                                 scrambled it to make.</p>
                         </div>
                         <div class="button-group">
                             <a class="custom-btn fill-btn" href="#">Start Trading</a>
                             <a class="custom-btn outline-color-azul" href="#">learn more</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 col-sm-12">
                     <div class="earn-more-img">
                         <img src="{{asset('images/earn-more.png')}}" alt="earn-more">
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>