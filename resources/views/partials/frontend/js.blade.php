<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- localstorage -->
<!-- <script>
    $(document).ready(function() {
        alert();
        $('#selected-language').on('change', function() {
            const selectedLanguage = $(this).val();
            localStorage.setItem('language', selectedLanguage);
            selectedLanguage.innerHTML = languages[selectedLanguage];
        });
    });
</script> -->
<!-- end localstorage -->

<script>
    // $('a.v2-btn.custom-btn.fill-btn').click(function() {
    //     $('.v2-cookie').remove();
    // });
    var swiper = new Swiper('.our-package-slider', {
        
        slidesPerView: 3,
        centeredSlides: true,
        paginationClickable: true,
        loop: true,
        spaceBetween: 24,
        breakpoints: {
            767: {
                slidesPerView: 3,
            },
            575: {
                slidesPerView: 1,
            }
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
    var swiper = new Swiper('.traders-say-slider', {
        loop: false,
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
        loop: false,
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


    // $(".showDetails-more").click(function () {
    //     var $wrapper =$('.showMore-wrapper');
    //     if($wrapper.hasClass("showDetails-height")) {
    //         $(".showDetails-more").text("Show less");
    //     } else {
    //         $(".showDetails-more").text("Show more");
    //     }
    //     $wrapper.toggleClass("showDetails-height");
    // });
</script>