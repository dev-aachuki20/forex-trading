<section class="you-learn-sec padding-tb-120 bg-white-to-offblue-gradient-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="section-head text-center">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : "What You’ll Learn" }}</h2>
                    <div class="discription">
                        <p>{!! $sectionDetail ? ucfirst($sectionDetail->description) : 'Fill out the form below to gain access to our affiliate program portal, along with your customized affiliate links, tracking metrics and affiliate marketing materials.' !!}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="you-learn-list">
                    <ul>
                        @foreach($getData as $key => $data)
                        <li>{{$data ? ucfirst($data->name) : ''}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>