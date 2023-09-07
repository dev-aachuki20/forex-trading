<div>
    @if($instagramMembers->count()>0)
    <section class="latest-from-instastagram padding-tb-120 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="section-head text-center mb-5">
                        <h2>join my team latest from instastagram</h2>
                        <div class="discription">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gap-24">
                @foreach($instagramMembers->take($displayedImages) as $key=> $instagramuser)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#" class="join-team-img">
                        <div class="join-team-img-inner">
                            @if($key < $displayedImages) <img src="{{$instagramuser->image_url}}">
                                <span><img src="{{asset('images/meet-our-founder/arrowdown.svg')}}" alt="arrowdown"></span>
                                @endif
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @if($displayedImages < $instagramMembers->count())
                <div class="button-group justify-content-center">
                    <button wire:click="loadMore" class="custom-btn outline-color-azul">Load More</button>
                </div>
                @endif
        </div>
    </section>
    @endif
</div>