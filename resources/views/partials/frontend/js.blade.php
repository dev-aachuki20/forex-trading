<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>


<script>
    $('a.v2-btn.custom-btn.fill-btn').click(function() {
        $('.v2-cookie').remove();
    });
    var swiper = new Swiper('.our-package-slider', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        slidesPerView: 3,
        centeredSlides: true,
        paginationClickable: true,
        loop: true,
        spaceBetween: 24,
        breakpoints: {
            960: {
                slidesPerView: 2,
            },
            575: {
                slidesPerView: 1,
            }
        }
    });
    var swiper = new Swiper('.traders-say-slider', {
        loop: true,
        slidesPerView: 3,
        slidesPerGroup: 1,
        spaceBetween: 24,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        breakpoints: {
            960: {
                slidesPerView: 2,
            },
            575: {
                slidesPerView: 1,
            }
        }
    });
    // slider logo
    var swiper = new Swiper(".slider-logos", {
        loop: true,
        slidesPerView: 5,
        spaceBetween: 25,
        watchSlidesProgress: true,
        breakpoints: {
            1024: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 3,
            },
            480: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            }
        },
        navigation: {
            nextEl: '.logo-next',
            prevEl: '.logo-prev',
        },
        autoplay: {
            delay: 5500
        },
    });
    // video js
    $(".box-video").click(function() {
        $('video source', this)[0].src += "&amp;autoplay=1";
        $(this).addClass('open');
    });
    $(window).ready(function() {
        $('#exampleModal').modal('show');
    });
    // 
</script>