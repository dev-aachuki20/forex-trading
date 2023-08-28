<section class="bg-white features-sec padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>features</h2>
                    <div class="discription">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gap-24">
            @if($features->count()>0)
            @foreach($features as $feature)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="position-relative box-card">
                    <div class="box-icon">
                        <img src="images/icons/cardtick.svg" alt="cardtick">
                    </div>
                    <div class="box-text">
                        <h4>{{ucwords($feature->title)}}</h4>
                        <div class="discription">
                            <p>{!! $feature->description !!}</p>
                        </div>
                        <div class="button-group">
                            <a class="custom-btn outline-color-azul stretched-link" href="get-funded.html">Start Trading</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>