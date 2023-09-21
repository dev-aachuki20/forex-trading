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
    {{-- how it works --}}
    @livewire('frontend.sections.how-it-works', ['localeid' => $localeid])
    <!-- packages -->
    @livewire('frontend.sections.package', ['localeid' => $localeid])

    
    @php
    $getContent = getSectionContent(config('constants.faq_setting_key')['2'], $this->localeid);
    @endphp

    @if($getContent)
    <section class="padding-tb-120 faq-sec bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center">
                        <h2>{{$getContent && $getContent->title ?  ucwords($getContent->title) : ''}}</h2>
                        <div class="discription">
                            <p>{!! ucfirst($getContent->description) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="faq-accordion">
                        <div class="accordion" id="accordionExample">
                            @if($faqsrecords->count()>0)
                                @foreach ($faqsrecords as $key => $record)
                                <div class="accordion-item">
                                    <a href="javascript:void(0);" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{ $key }}" aria-expanded="true" aria-controls="collapseOne{{ $key }}">{{ ucwords($record->question) }}</a>
                                    <div id="collapseOne{{ $key }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="discription">
                                                <p>{!! $record->answer !!}</p>
                                            </div>
                                            <div class="button-group share-group">
                                                <a class="custom-btn fill-btn" href="#" data-bs-toggle="modal" data-bs-target="#share-social">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 14.25H15V10.5H16.5V15C16.5 15.4142 16.1642 15.75 15.75 15.75H2.25C1.83579 15.75 1.5 15.4142 1.5 15V10.5H3V14.25ZM9 7.5H6.75C5.25331 7.5 3.92728 8.23065 3.10917 9.35475C3.64373 6.58884 6.07793 4.5 9 4.5V1.5L15 6L9 10.5V7.5Z" />
                                                    </svg>
                                                    Share</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bacdrops"></div>
                                </div>
                                @endforeach
                            @endif
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
                        <li>
                            <a href="https://www.facebook.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M40.437 55.166c-.314 0-6.901.002-9.939-.001-1.564-.001-2.122-.563-2.122-2.137a9807.51 9807.51 0 0 1 0-12.129c.001-1.554.591-2.147 2.135-2.148 3.038-.002 9.589-.001 9.926-.001v-8.802c.002-3.974.711-7.778 2.73-11.261 2.067-3.565 5.075-6.007 8.93-7.419 2.469-.905 5.032-1.266 7.652-1.268 3.278-.002 6.556.001 9.835.007 1.409.002 2.034.625 2.037 2.044.006 3.803.006 7.606 0 11.408-.002 1.434-.601 2.01-2.042 2.026-2.687.029-5.376.011-8.06.119-2.711 0-4.137 1.324-4.137 4.13-.065 2.968-.027 5.939-.027 9.015.254 0 7.969-.001 11.575 0 1.638 0 2.198.563 2.198 2.21 0 4.021-.001 8.043-.004 12.064-.001 1.623-.527 2.141-2.175 2.142-3.606.002-11.291.001-11.627.001v32.545c0 1.735-.546 2.288-2.258 2.288H42.541c-1.513 0-2.103-.588-2.103-2.101l-.001-32.732z" data-original="#3d6ad6"></path></g></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/i/flow/login" target="_blank" id="twitter">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M512 97.248c-19.04 8.352-39.328 13.888-60.48 16.576 21.76-12.992 38.368-33.408 46.176-58.016-20.288 12.096-42.688 20.64-66.56 25.408C411.872 60.704 384.416 48 354.464 48c-58.112 0-104.896 47.168-104.896 104.992 0 8.32.704 16.32 2.432 23.936-87.264-4.256-164.48-46.08-216.352-109.792-9.056 15.712-14.368 33.696-14.368 53.056 0 36.352 18.72 68.576 46.624 87.232-16.864-.32-33.408-5.216-47.424-12.928v1.152c0 51.008 36.384 93.376 84.096 103.136-8.544 2.336-17.856 3.456-27.52 3.456-6.72 0-13.504-.384-19.872-1.792 13.6 41.568 52.192 72.128 98.08 73.12-35.712 27.936-81.056 44.768-130.144 44.768-8.608 0-16.864-.384-25.12-1.44C46.496 446.88 101.6 464 161.024 464c193.152 0 298.752-160 298.752-298.688 0-4.64-.16-9.12-.384-13.568 20.832-14.784 38.336-33.248 52.608-54.496z" data-original="#03a9f4"></path></g></svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/accounts/login/">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                    <g>
                                        <path d="M371.643 0H140.357C62.964 0 0 62.964 0 140.358v231.285C0 449.037 62.964 512 140.357 512h231.286C449.037 512 512 449.037 512 371.643V140.358C512 62.964 449.037 0 371.643 0zm110.121 371.643c0 60.721-49.399 110.121-110.121 110.121H140.357c-60.721 0-110.121-49.399-110.121-110.121V140.358c0-60.722 49.4-110.122 110.121-110.122h231.286c60.722 0 110.121 49.4 110.121 110.122v231.285z" data-original="#000000"></path>
                                        <path d="M256 115.57c-77.434 0-140.431 62.997-140.431 140.431S178.565 396.432 256 396.432c77.434 0 140.432-62.998 140.432-140.432S333.434 115.57 256 115.57zm0 250.627c-60.762 0-110.196-49.435-110.196-110.197S195.238 145.804 256 145.804c60.763 0 110.197 49.435 110.197 110.197S316.763 366.197 256 366.197zM404.831 64.503c-23.526 0-42.666 19.141-42.666 42.667 0 23.526 19.14 42.666 42.666 42.666 23.526 0 42.666-19.141 42.666-42.667s-19.14-42.666-42.666-42.666zm0 55.096c-6.853 0-12.43-5.576-12.43-12.43s5.577-12.43 12.43-12.43c6.854 0 12.43 5.577 12.43 12.43s-5.576 12.43-12.43 12.43z" data-original="#000000"></path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://web.whatsapp.com/">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                    <g>
                                        <path d="m17.507 14.307-.009.075c-2.199-1.096-2.429-1.242-2.713-.816-.197.295-.771.964-.944 1.162-.175.195-.349.21-.646.075-.3-.15-1.263-.465-2.403-1.485-.888-.795-1.484-1.77-1.66-2.07-.293-.506.32-.578.878-1.634.1-.21.049-.375-.025-.524-.075-.15-.672-1.62-.922-2.206-.24-.584-.487-.51-.672-.51-.576-.05-.997-.042-1.368.344-1.614 1.774-1.207 3.604.174 5.55 2.714 3.552 4.16 4.206 6.804 5.114.714.227 1.365.195 1.88.121.574-.091 1.767-.721 2.016-1.426.255-.705.255-1.29.18-1.425-.074-.135-.27-.21-.57-.345z" data-original="#000000"></path>
                                        <path d="M20.52 3.449C12.831-3.984.106 1.407.101 11.893c0 2.096.549 4.14 1.595 5.945L0 24l6.335-1.652c7.905 4.27 17.661-1.4 17.665-10.449 0-3.176-1.24-6.165-3.495-8.411zm1.482 8.417c-.006 7.633-8.385 12.4-15.012 8.504l-.36-.214-3.75.975 1.005-3.645-.239-.375c-4.124-6.565.614-15.145 8.426-15.145a9.865 9.865 0 0 1 7.021 2.91 9.788 9.788 0 0 1 2.909 6.99z" data-original="#000000"></path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://web.telegram.org/a/">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                    <g>
                                        <path d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931L23.93 3.821l.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693L18.953 5.78c.595-.394 1.136-.176.691.218z" data-original="#039be5"></path>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://line.me/en/">
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
        </div>
    </div>
</div>