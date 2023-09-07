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
                @foreach($instagramMembers as $instagramuser)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <a href="#" class="join-team-img">
                        <div class="join-team-img-inner">
                            <img src="{{$instagramuser->image_url}}">
                            <span><img src="{{asset('images/meet-our-founder/arrowdown.svg')}}" alt="arrowdown"></span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="button-group justify-content-center">
                <a class="custom-btn outline-color-azul" href="#">Load More</a>
            </div>
        </div>
    </section>
    @endif
</div>