<section class="bg-white-to-offblue-gradient-color  padding-tb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-sm-12">
                <div class="section-head text-center mw-100">
                    <h2>{{ $sectionDetail ? ucwords($sectionDetail->title) : 'Title' }}</h2>
                    {!! $sectionDetail ? ucfirst($sectionDetail->description) : '' !!}
                </div>
</section>