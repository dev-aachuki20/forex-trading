 <div class="outer-inner-container">
     @if($pageDetail)
     <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url : config('constants.banner_image_default.other') }});">
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
     <!-- packages -->
     @livewire('frontend.sections.package', ['localeid' => $localeid])
     <!-- trading rules -->
     @livewire('frontend.sections.trading-rules', ['localeid' => $localeid])
     <!-- withdrawing profits-->
     @livewire('frontend.sections.withdrawing-profit', ['localeid' => $localeid])
     <!-- earn-more-trading-activity'-->
     @livewire('frontend.sections.earn-more-trading-activity', ['localeid' => $localeid])
 </div>