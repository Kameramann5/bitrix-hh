window.onload = function() {

    var mySwiper = new Swiper('.swiper-index', {

        centeredSlides: true,
        centeredSlidesBounds: true,
        spaceBetween: 15,
        loop: true,

        loopedSlides: 2,

        breakpoints: {
            320: {
                spaceBetween: 15,
            },
            768: {
                spaceBetween: 15,
            },
            1024: {

                spaceBetween: 15,
            },
        },
        navigation: {
            prevEl: ".index--swiper-button-prev",
            nextEl: ".index--swiper-button-next",
        },
        /*  speed: 800,
          autoplay: {
              delay: 4000,
              disableOnInteraction: false
          },*/
    });

    $().fancybox({
        buttons: [
            "close"
        ],
        loop: false,
        protect: true,
        infobar: false,
        selector : '[data-fancybox="slider-gallery"]',
        thumbs   : false,
        hash     : false,
        animationEffect : "fade",
        beforeClose : function(instance) {



            // Update position of the slider
            mySwiper.slideTo( instance.currIndex, 0 );

        }
    });








};
