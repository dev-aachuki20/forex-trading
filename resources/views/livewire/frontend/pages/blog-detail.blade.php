<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{ $pageDetail->image_url ? $pageDetail->image_url :asset('images/other-pages-bg.jpg')}});">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">{{ $pageDetail ? ucwords($pageDetail->title) : 'Blog Details' }}</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>{{ $pageDetail ? ucwords($pageDetail->sub_title) : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @if($blogDetails)
    <section class="bg-white video-details-section padding-tb-120 blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 align-self-end">
                </div>
            </div>
            <div class="blog-list">
               
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="blogData-box">
                            
                            <div class="latestData-wrapper blogDetail-wrapper">
                                <div class="row">
        
                                    <div class="col-12 col-md-12">
                                        <div class="blogBox-wrap">
        
                                            <div class="img-box mb-3">
                                                <img class="img-fluid" src="{{$blogDetails->image_url}}" alt="">
                                            </div>
        
                                            
                                            <div class="blogDetail-title mb-3">
                                                <h4>
                                                    {{ucwords($blogDetails->title)}}
                                                </h4>
                                                
                                                <ul class="bioData-blog mb-3">
                                                    <li class="bioData-blog-link">
                                                        <span>
                                                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            {{ convertDateTimeFormat($blogDetails->publish_date, 'monthformat') }}
                                                        </span>
                                                    </li>
                                                </ul>

                                                <h6 class="mb-20">{{$blogDetails->category ? ucwords($blogDetails->category) : ''}}</h6>
                                            </div>
        
                                            <div class="description mb-3">
                                                {!! ucwords($blogDetails->description) !!}
                                            </div>
                                            <!-- end  -->

                                           
                                          <div class="tagsBox-wrapper d-flex align-items-center justify-content-between">
                                            <div class="tagListing-main d-flex align-items-start">
                                                <div class="tagTitle-wrap">
                                                    <h6>
                                                        {{__('frontend.tags')}} :
                                                    </h6>
                                                </div>
                                                <ul class="tagListing-box">
                                                   @if($blogDetails->selectedTags)
                                                        @foreach($blogDetails->selectedTags()->get() as $tag)
                                                        <li>
                                                            <a href="{{ route('traders-corner-blog',$tag->title) }}">
                                                                {{ $tag->title }}
                                                            </a>
                                                        </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                              <div class="socialMedia-box social-share-popup">
                                                <ul class="icons">
                                                  <li>
                                                      <a href="javascript:void(0);" wire:click.prevent="shareSocialMedia('facebook')">
                                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                              <g>
                                                                  <path d="M40.437 55.166c-.314 0-6.901.002-9.939-.001-1.564-.001-2.122-.563-2.122-2.137a9807.51 9807.51 0 0 1 0-12.129c.001-1.554.591-2.147 2.135-2.148 3.038-.002 9.589-.001 9.926-.001v-8.802c.002-3.974.711-7.778 2.73-11.261 2.067-3.565 5.075-6.007 8.93-7.419 2.469-.905 5.032-1.266 7.652-1.268 3.278-.002 6.556.001 9.835.007 1.409.002 2.034.625 2.037 2.044.006 3.803.006 7.606 0 11.408-.002 1.434-.601 2.01-2.042 2.026-2.687.029-5.376.011-8.06.119-2.711 0-4.137 1.324-4.137 4.13-.065 2.968-.027 5.939-.027 9.015.254 0 7.969-.001 11.575 0 1.638 0 2.198.563 2.198 2.21 0 4.021-.001 8.043-.004 12.064-.001 1.623-.527 2.141-2.175 2.142-3.606.002-11.291.001-11.627.001v32.545c0 1.735-.546 2.288-2.258 2.288H42.541c-1.513 0-2.103-.588-2.103-2.101l-.001-32.732z" data-original="#3d6ad6"></path>
                                                              </g>
                                                          </svg>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a href="javascript:void(0);" wire:click.prevent="shareSocialMedia('twitter')">
                                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                              <g>
                                                                  <path d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" data-original="#03a9f4"></path>
                                                              </g>
                                                          </svg>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a href="javascript:void(0);" wire:click="shareSocialMedia('instagram')">
                                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                              <g>
                                                                  <path d="M371.643 0H140.357C62.964 0 0 62.964 0 140.358v231.285C0 449.037 62.964 512 140.357 512h231.286C449.037 512 512 449.037 512 371.643V140.358C512 62.964 449.037 0 371.643 0zm110.121 371.643c0 60.721-49.399 110.121-110.121 110.121H140.357c-60.721 0-110.121-49.399-110.121-110.121V140.358c0-60.722 49.4-110.122 110.121-110.122h231.286c60.722 0 110.121 49.4 110.121 110.122v231.285z" data-original="#000000"></path>
                                                                  <path d="M256 115.57c-77.434 0-140.431 62.997-140.431 140.431S178.565 396.432 256 396.432c77.434 0 140.432-62.998 140.432-140.432S333.434 115.57 256 115.57zm0 250.627c-60.762 0-110.196-49.435-110.196-110.197S195.238 145.804 256 145.804c60.763 0 110.197 49.435 110.197 110.197S316.763 366.197 256 366.197zM404.831 64.503c-23.526 0-42.666 19.141-42.666 42.667 0 23.526 19.14 42.666 42.666 42.666 23.526 0 42.666-19.141 42.666-42.667s-19.14-42.666-42.666-42.666zm0 55.096c-6.853 0-12.43-5.576-12.43-12.43s5.577-12.43 12.43-12.43c6.854 0 12.43 5.577 12.43 12.43s-5.576 12.43-12.43 12.43z" data-original="#000000"></path>
                                                              </g>
                                                          </svg>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a href="javascript:void(0);" wire:click.prevent="shareSocialMedia('whatsapp')">
                                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                              <g>
                                                                  <path d="m17.507 14.307-.009.075c-2.199-1.096-2.429-1.242-2.713-.816-.197.295-.771.964-.944 1.162-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.293-.506.32-.578.878-1.634.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.576-.05-.997-.042-1.368.344-1.614 1.774-1.207 3.604.174 5.55 2.714 3.552 4.16 4.206 6.804 5.114.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345z" data-original="#000000"></path>
                                                                  <path d="M20.52 3.449C12.831-3.984.106 1.407.101 11.893c0 2.096.549 4.14 1.595 5.945L0 24l6.335-1.652c7.905 4.27 17.661-1.4 17.665-10.449 0-3.176-1.24-6.165-3.495-8.411zm1.482 8.417c-.006 7.633-8.385 12.4-15.012 8.504l-.36-.214-3.75.975 1.005-3.645-.239-.375c-4.124-6.565.614-15.145 8.426-15.145a9.865 9.865 0 0 1 7.021 2.91 9.788 9.788 0 0 1 2.909 6.99z" data-original="#000000"></path>
                                                              </g>
                                                          </svg>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a  href="javascript:void(0);" wire:click.prevent="shareSocialMedia('telegram')">
                                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                              <g>
                                                                  <path d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931L23.93 3.821l.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693L18.953 5.78c.595-.394 1.136-.176.691.218z" data-original="#039be5"></path>
                                                              </g>
                                                          </svg>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a href="javascript:void(0);" wire:click.prevent="shareSocialMedia('line')">
                                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths">
                                                              <g>
                                                                  <path d="M0 10.34c0 5.098 4.229 9.388 9.997 10.191.387.085.473.173.475.173.071.161-.11.931-.188 1.673-.197 1.315.641 2.002 2.032 1.391 1.316-.577 6.693-4.141 9.112-7.061 2.655-3.056 3.296-6.743 1.759-10.117C18.327-4.068 0-.995 0 10.34zm20.284 5.396c-2.202 2.658-7.152 5.985-8.488 6.62.172-1.38.679-2.816-1.534-3.301C5.185 18.347 1.5 14.682 1.5 10.34 1.5.621 17.628-1.991 21.821 7.212c1.283 2.816.728 5.918-1.537 8.524z" data-original="#000000" class="hovered-path"></path>
                                                                  <path d="M7.598 11.739H6.392V7.598a.75.75 0 0 0-1.5 0v4.892c0 .414.336.75.75.75h1.956c.992-.001.992-1.501 0-1.501zM8.805 7.598c.224 3.768-.551 5.642.75 5.642a.75.75 0 0 0 .75-.75V7.598c0-.992-1.5-.993-1.5 0zM18.358 8.348c.992 0 .993-1.5 0-1.5h-1.956a.75.75 0 0 0-.75.75v4.892c0 .414.336.75.75.75h1.956c.992 0 .993-1.5 0-1.5h-1.206v-.946h1.206c.992 0 .993-1.5 0-1.5h-1.206v-.946zM13.695 7.598v2.184l-1.541-2.569c-.392-.652-1.394-.371-1.394.386v4.892a.75.75 0 0 0 1.5 0v-2.184l1.541 2.569a.752.752 0 0 0 1.394-.386V7.598c0-.992-1.5-.993-1.5 0z" data-original="#000000" class="hovered-path"></path>
                                                              </g>
                                                          </svg>
                                                      </a>
                                                  </li>
                                              </ul>
                                              </div>
                                          </div>

                                           <div class="authorBox-main">
                                            <div class="authorBox-wrapper">
                                                <div class="authorIcon">
                                                @if($blogDetails->author_image_url)
                                                    <img class="img-fluid" src="{{ $blogDetails->author_image_url }}" alt="">
                                                @else
                                                    <img class="img-fluid" src="{{ asset(config('constants.default.user_logo')) }}" alt="">
                                                @endif
                                                </div>
                                                <div class="authorContent">
                                                    <div class="title">
                                                        <h6>
                                                            {{ ucwords($blogDetails->author_name) }}
                                                        </h6>
                                                        <span>
                                                            {{__('frontend.author')}}
                                                        </span>
                                                    </div>
                                                    <div class="description">
                                                        <p>
                                                            {!! $blogDetails->author_description !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                          <div class="swiper bloggird_slides traders-say-slider blog_slider_box swiper-container-horizontal">
                                            <div class="bloggird_arrow d-flex align-items-center justify-content-between">
                                                <div class="title">
                                                    <h6>
                                                        {{__('frontend.articles_top_bar_title')}}
                                                    </h6>
                                                </div>
                                                <div class="nextPrev-box d-flex align-items-center">
                                                    <div class="swiper-button-prev">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.29373 8.1745C3.29373 8.04967 3.34144 7.92472 3.43674 7.82942L8.31769 2.94846C8.50842 2.75774 8.81726 2.75774 9.00786 2.94846C9.19846 3.13919 9.19858 3.44803 9.00786 3.63863L4.47199 8.1745L9.00786 12.7104C9.19858 12.9011 9.19858 13.2099 9.00786 13.4005C8.81714 13.5911 8.50829 13.5913 8.31769 13.4005L3.43674 8.51958C3.34144 8.42428 3.29373 8.29933 3.29373 8.1745ZM7.3415 8.51958L12.2225 13.4005C12.4132 13.5913 12.722 13.5913 12.9126 13.4005C13.1032 13.2098 13.1033 12.901 12.9126 12.7104L8.37675 8.1745L12.9126 3.63863C13.1033 3.44791 13.1033 3.13906 12.9126 2.94846C12.7219 2.75786 12.4131 2.75774 12.2225 2.94846L7.3415 7.82942C7.2462 7.92472 7.19849 8.04967 7.19849 8.1745C7.19849 8.29933 7.2462 8.42428 7.3415 8.51958Z" fill="#1E1F1F"/>
                                                        </svg>
                                                    </div>
                                                    <div class="swiper-button-next">
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.7063 8.1745C12.7063 8.04967 12.6586 7.92472 12.5633 7.82942L7.68231 2.94846C7.49158 2.75774 7.18274 2.75774 6.99214 2.94846C6.80154 3.13919 6.80142 3.44803 6.99214 3.63863L11.528 8.1745L6.99214 12.7104C6.80142 12.9011 6.80142 13.2099 6.99214 13.4005C7.18286 13.5911 7.49171 13.5913 7.68231 13.4005L12.5633 8.51958C12.6586 8.42428 12.7063 8.29933 12.7063 8.1745ZM8.6585 8.51958L3.77754 13.4005C3.58682 13.5913 3.27798 13.5913 3.08738 13.4005C2.89678 13.2098 2.89665 12.901 3.08738 12.7104L7.62325 8.1745L3.08738 3.63863C2.89666 3.44791 2.89666 3.13906 3.08738 2.94846C3.2781 2.75786 3.58694 2.75774 3.77754 2.94846L8.6585 7.82942C8.7538 7.92472 8.80151 8.04967 8.80151 8.1745C8.80151 8.29933 8.7538 8.42428 8.6585 8.51958Z" fill="#1E1F1F"/>
                                                        </svg>                                                
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="swiper-wrapper main_slides">   
                                                    
                                                @foreach($latestPost as $key=>$post)
                                                <div class="swiper-slide items_grid">
                                                    <a href="{{route('blog-detail', ['localeLang' => app()->getLocale(),'slug' => $post->id])}}" class="blogBox-wrap">
                                                        <div class="img-box">
                                                            <img class="img-fluid" src="{{ $post->image_url }}" alt="">
                                                        </div>
                                                        <div class="blogTitle">
                                                            <h6>
                                                                {{ucwords($post->title)}}
                                                            </h6>
                                                            <h6 class="mb-20">{{$post->category ? ucwords($post->category) : ''}}</h6>
                                                        </div>
                                                        <ul class="bioData-blog">
                                                            <li class="bioData-blog-link">
                                                                <span>
                                                                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"/>
                                                                        <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    </svg>                                                        
                                                                    {{ convertDateTimeFormat($post->publish_date, 'monthformat') }}
                                                                </span>
                                                            </li>
                                                            
                                                        </ul>
                                                        <div class="description">
                                                            <p>
                                                                {!! \Str::limit(strip_tags($post->description), 90) !!}
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                @endforeach
                                                   
                                            </div>
                                          </div>
        
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <!-- end latestData -->
                        </div>
                    </div>
        
                    <div class="col-12 col-lg-4">
                        <div class="blogRight-box">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mostPopular-wrap">
                                        <div class="blogHead-title">
                                            <h6>
                                                {{__('frontend.most_popular')}}
                                            </h6>
                                        </div>
                                        <div class="blogBox-wrap">
                                            <div class="img-box mb-3">
                                                <img class="img-fluid" src="{{$blogDetails->image_url}}" alt="">
                                            </div>
                                            <div class="blogTitle">
                                                <h6>
                                                    {{ucwords($blogDetails->title)}}
                                                </h6>
                                            </div>

                                            <ul class="bioData-blog mb-3">
                                                <li class="bioData-blog-link">
                                                    <span>
                                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        {{ convertDateTimeFormat($blogDetails->publish_date, 'monthformat') }}
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="latestBlog-gridList">
                                                <ul class="latestBlog-gridList-box">
                                                    @foreach($latestPost as $key=>$post)
                                                    <li class="latestBlog-gridList-box-link">
                                                        <a class="latestBlog-gridList-box-link-tab" href="{{route('blog-detail', ['localeLang' => app()->getLocale(),'slug' => $post->id])}}">
                                                            <div class="rightBox">
                                                                <div class="blogTitle">
                                                                    <h6>
                                                                        {{ucwords($post->title)}}
                                                                    </h6>
                                                                </div>
                                                                <ul class="bioData-blog">
                                                                    <li class="bioData-blog-link">
                                                                        <span>
                                                                            <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M8.66683 2.33337H2.25016C1.7439 2.33337 1.3335 2.74378 1.3335 3.25004V9.66671C1.3335 10.173 1.7439 10.5834 2.25016 10.5834H8.66683C9.17309 10.5834 9.5835 10.173 9.5835 9.66671V3.25004C9.5835 2.74378 9.17309 2.33337 8.66683 2.33337Z" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M7.2915 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M3.62549 1.41675V3.25008" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M1.3335 5.08337H9.5835" stroke="#5B687A" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                            </svg>
                                                                            {{ convertDateTimeFormat($post->publish_date, 'monthformat') }}
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{--Start Tags --}}
                                <div class="col-12">
                                    <div class="tagBox-wrap mostPopular-wrap mt-4">
                                        <div class="blogHead-title">
                                            <h6>
                                                {{__('frontend.tags')}}
                                            </h6>
                                        </div>
                                        <ul class="tagListing-box">

                                            @if($allTags)
                                                @foreach($allTags as $tag)
                                                <li>
                                                    <a href="{{ route('traders-corner-blog',$tag->title) }}">
                                                        {{ $tag->title }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            @endif
                                           

                                        </ul>
                                    </div>
                                </div>
                                {{-- End Tags --}}

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    </section>
    @endif

    <div class="modal fade social-share-popup" id="share-social" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Share With</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5>Share this link via</h5>
              <ul class="icons">
                <a href="javascript:void(0);" onclick="shareOnFacebook()">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M40.437 55.166c-.314 0-6.901.002-9.939-.001-1.564-.001-2.122-.563-2.122-2.137a9807.51 9807.51 0 0 1 0-12.129c.001-1.554.591-2.147 2.135-2.148 3.038-.002 9.589-.001 9.926-.001v-8.802c.002-3.974.711-7.778 2.73-11.261 2.067-3.565 5.075-6.007 8.93-7.419 2.469-.905 5.032-1.266 7.652-1.268 3.278-.002 6.556.001 9.835.007 1.409.002 2.034.625 2.037 2.044.006 3.803.006 7.606 0 11.408-.002 1.434-.601 2.01-2.042 2.026-2.687.029-5.376.011-8.06.119-2.711 0-4.137 1.324-4.137 4.13-.065 2.968-.027 5.939-.027 9.015.254 0 7.969-.001 11.575 0 1.638 0 2.198.563 2.198 2.21 0 4.021-.001 8.043-.004 12.064-.001 1.623-.527 2.141-2.175 2.142-3.606.002-11.291.001-11.627.001v32.545c0 1.735-.546 2.288-2.258 2.288H42.541c-1.513 0-2.103-.588-2.103-2.101l-.001-32.732z" data-original="#3d6ad6"></path></g></svg>
                </a>
                <a href="javascript:void(0);" onclick="shareOnTwitter()">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" data-original="#03a9f4"></path></g></svg>
                </a>
                <a href="javascript:void(0);" onclick="shareOnInstagram()">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" ><g><path d="M371.643 0H140.357C62.964 0 0 62.964 0 140.358v231.285C0 449.037 62.964 512 140.357 512h231.286C449.037 512 512 449.037 512 371.643V140.358C512 62.964 449.037 0 371.643 0zm110.121 371.643c0 60.721-49.399 110.121-110.121 110.121H140.357c-60.721 0-110.121-49.399-110.121-110.121V140.358c0-60.722 49.4-110.122 110.121-110.122h231.286c60.722 0 110.121 49.4 110.121 110.122v231.285z" data-original="#000000" ></path><path d="M256 115.57c-77.434 0-140.431 62.997-140.431 140.431S178.565 396.432 256 396.432c77.434 0 140.432-62.998 140.432-140.432S333.434 115.57 256 115.57zm0 250.627c-60.762 0-110.196-49.435-110.196-110.197S195.238 145.804 256 145.804c60.763 0 110.197 49.435 110.197 110.197S316.763 366.197 256 366.197zM404.831 64.503c-23.526 0-42.666 19.141-42.666 42.667 0 23.526 19.14 42.666 42.666 42.666 23.526 0 42.666-19.141 42.666-42.667s-19.14-42.666-42.666-42.666zm0 55.096c-6.853 0-12.43-5.576-12.43-12.43s5.577-12.43 12.43-12.43c6.854 0 12.43 5.577 12.43 12.43s-5.576 12.43-12.43 12.43z" data-original="#000000" ></path></g></svg>
                </a>
                <a href="javascript:void(0);" onclick="shareOnWhatsApp()">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="m17.507 14.307-.009.075c-2.199-1.096-2.429-1.242-2.713-.816-.197.295-.771.964-.944 1.162-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.293-.506.32-.578.878-1.634.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.576-.05-.997-.042-1.368.344-1.614 1.774-1.207 3.604.174 5.55 2.714 3.552 4.16 4.206 6.804 5.114.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345z" data-original="#000000"></path><path d="M20.52 3.449C12.831-3.984.106 1.407.101 11.893c0 2.096.549 4.14 1.595 5.945L0 24l6.335-1.652c7.905 4.27 17.661-1.4 17.665-10.449 0-3.176-1.24-6.165-3.495-8.411zm1.482 8.417c-.006 7.633-8.385 12.4-15.012 8.504l-.36-.214-3.75.975 1.005-3.645-.239-.375c-4.124-6.565.614-15.145 8.426-15.145a9.865 9.865 0 0 1 7.021 2.91 9.788 9.788 0 0 1 2.909 6.99z" data-original="#000000"></path></g></svg>
                </a>
                <a href="javascript:void(0);" onclick="shareOnTelegram()">
                  <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931L23.93 3.821l.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693L18.953 5.78c.595-.394 1.136-.176.691.218z" data-original="#039be5"></path></g></svg>
                </a>
                <a href="javascript:void(0);" onclick="shareOnLine()">
                 <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path d="M0 10.34c0 5.098 4.229 9.388 9.997 10.191.387.085.473.173.475.173.071.161-.11.931-.188 1.673-.197 1.315.641 2.002 2.032 1.391 1.316-.577 6.693-4.141 9.112-7.061 2.655-3.056 3.296-6.743 1.759-10.117C18.327-4.068 0-.995 0 10.34zm20.284 5.396c-2.202 2.658-7.152 5.985-8.488 6.62.172-1.38.679-2.816-1.534-3.301C5.185 18.347 1.5 14.682 1.5 10.34 1.5.621 17.628-1.991 21.821 7.212c1.283 2.816.728 5.918-1.537 8.524z" data-original="#000000" class="hovered-path"></path><path d="M7.598 11.739H6.392V7.598a.75.75 0 0 0-1.5 0v4.892c0 .414.336.75.75.75h1.956c.992-.001.992-1.501 0-1.501zM8.805 7.598c.224 3.768-.551 5.642.75 5.642a.75.75 0 0 0 .75-.75V7.598c0-.992-1.5-.993-1.5 0zM18.358 8.348c.992 0 .993-1.5 0-1.5h-1.956a.75.75 0 0 0-.75.75v4.892c0 .414.336.75.75.75h1.956c.992 0 .993-1.5 0-1.5h-1.206v-.946h1.206c.992 0 .993-1.5 0-1.5h-1.206v-.946zM13.695 7.598v2.184l-1.541-2.569c-.392-.652-1.394-.371-1.394.386v4.892a.75.75 0 0 0 1.5 0v-2.184l1.541 2.569a.752.752 0 0 0 1.394-.386V7.598c0-.992-1.5-.993-1.5 0z" data-original="#000000" class="hovered-path"></path></g></svg>
                </a>
              </ul>
            </div>
          </div>
        </div>
      </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $(".videos-container video").each(function(index, video) {
            video.addEventListener("loadedmetadata", function() {
                var duration = video.duration;
                var durationString = formatDuration(duration);
                $(this).next(".meta").html("<p>Video " + (index + 1) + ": " + durationString + "</p>")
            });
        });
    });

    function formatDuration(seconds) {
        var date = new Date(null);
        date.setSeconds(seconds);
        return date.toISOString().substr(11, 8);
    }
</script>

@include('partials.frontend.share-social-media')

<script>
    // video play pause on hover
    var figure = $(".video-main").hover(hoverVideo, hideVideo);

    function hoverVideo(e) {
        $('video', this).get(0).play();
    }

    function hideVideo(e) {
        $('video', this).get(0).pause();
    }
    // scroll bar on click arrow
    (function($) {
        $(".cata-sub-nav").on('scroll', function() {
            $val = $(this).scrollLeft();
            if ($(this).scrollLeft() + $(this).innerWidth() >= $(this)[0].scrollWidth) {
                $(".nav-next").hide();
            } else {
                $(".nav-next").show();
            }
            if ($val == 0) {
                $(".nav-prev").hide();
            } else {
                $(".nav-prev").show();
            }
        });
        $(".nav-next").on("click", function() {
            $(".cata-sub-nav").animate({
                scrollLeft: '+=100'
            }, 300);
        });
        $(".nav-prev").on("click", function() {
            $(".cata-sub-nav").animate({
                scrollLeft: '-=100'
            }, 300);
        });

    })(jQuery);
    // filter on click button
    $(".filter-button").click(function() {
        $(this).addClass('fill-btn').siblings().removeClass('fill-btn');
        var value = $(this).attr('data-filter');
        if (value == "all") {
            $('.filter').show('1000');
        } else {
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');
        }
    });

    $(document).ready(function() {
        var swiper = new Swiper('.bloggird_slides', {
          slidesPerView: 2,
          spaceBetween: 40,
          navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
          },
          breakpoints: {
              320: {
                  slidesPerView: 1,
                  spaceBetween: 20
              },
              480: {
                  slidesPerView: 1,
                  spaceBetween: 30
              },
              640: {
                  slidesPerView: 2,
                  spaceBetween: 40
              }
          }
          });
    });

</script>
@endpush