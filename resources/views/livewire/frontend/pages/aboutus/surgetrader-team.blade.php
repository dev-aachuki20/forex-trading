<div class="outer-inner-container">
    <section class="other-page-banner ovarlay-color" style="background-image: url(images/other-pages-bg.jpg);">
        <div class="container z-10 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-sm-12">
                    <div class="home-banner-text text-center">
                        <h1 class="text-white">Our Team</h1>
                        <div class="discription text-white body-font-large mb-0">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team members -->
    @livewire('frontend.sections.team', ['localeid'=>$localeid])
    <!-- team members end -->

    <!-- testimonials -->
    @livewire('frontend.sections.testimonial', ['localeid'=>$localeid])
    <!-- testimonials end -->
</div>
@push('scripts')
<script>
    var swiper = new Swiper('.image-slider', {
        loop: true,
        slidesPerView: 4,
        slidesPerGroup: 1,
        spaceBetween: 24,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            1200: {
                slidesPerView: 3,
            },
            960: {
                slidesPerView: 2,
            },
            575: {
                slidesPerView: 1,
            }
        }
    });
</script>
@endpush