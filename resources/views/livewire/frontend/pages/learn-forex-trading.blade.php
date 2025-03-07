<div class="outer-inner-container">
    @if($pageDetail)
    <section class="other-page-banner ovarlay-color" style="background-image: url({{$pageDetail && $pageDetail->image_url ? $pageDetail->image_url :  config('constants.banner_image_default.other') }});">
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

    <!-- School of Forex Trading -->
    @livewire('frontend.sections.school-of-forex-trading', ['localeid'=>$localeid])

    <!-- track your progress -->
    @livewire('frontend.sections.track-your-progress', ['localeid'=>$localeid])


    <!-- learn-forex-section-one -->
    @livewire('frontend.sections.learn-forex-section-one', ['localeid'=>$localeid])

    {{-- <div class="google-ads">
        <a href="#">
            <img src="{{asset('images/google-adds.jpg')}}" alt="google-adds">
    </a>
</div> --}}

<!-- what you'll learn -->
@livewire('frontend.sections.what-you-will-learn', ['localeid'=>$localeid])


<!-- course content start -->
@livewire('frontend.sections.course-content', ['localeid'=>$localeid])

<!-- learn-forex-section-two -->
@livewire('frontend.sections.learn-forex-section-two', ['localeid'=>$localeid])

{{--<div class="google-ads">
        <a href="#">
            <img src="{{asset('images/google-adds-1.jpg')}}" alt="google-adds">
</a>
</div> --}}

<!-- course start -->
@livewire('frontend.sections.course', ['localeid'=>$localeid])

</div>


@push('scripts')
<script>
    jQuery(document).ready(function($) {
        var a = 0;
        $(window).scroll(function() {
            var oTop = $('#stats_id').offset().top - window.innerHeight;
            if (a == 0 && $(window).scrollTop() > oTop) {
                var i = 1;
                runAllGauges();
                a = 1;
            }

        });
    });

    function runAllGauges() {
        var gauges = $('.gauge-cont');
        $.each(gauges, function(i, v) {
            var self = this;
            setTimeout(function() {
                setGauge(self);
            }, i * 700);
        });
    }

    function resetAllGauges() {
        var gauges = $('.gauge-cont').get().reverse();
        $.each(gauges, function(i, v) {
            var self = this;
            setTimeout(function() {
                resetGauge(self);
            }, i * 700);
        });
    }

    function resetGauge(gauge) {
        var spinner = $(gauge).find('.spinner');
        var pointer = $(gauge).find('.pointer');
        $(spinner).attr({
            style: 'transform: rotate(0deg)'
        });
        $(pointer).attr({
            style: 'transform: rotate(-90deg)'
        });
    }

    function setGauge(gauge) {
        var percentage = $(gauge).data('percentage') / 100;
        var degrees = 180 * percentage;
        var pointerDegrees = degrees - 90;
        var spinner = $(gauge).find('.spinner');
        var pointer = $(gauge).find('.pointer');
        $(spinner).attr({
            style: 'transform: rotate(' + degrees + 'deg)'
        });
        $(pointer).attr({
            style: 'transform: rotate(' + pointerDegrees + 'deg)'
        });
    }
</script>
@endpush