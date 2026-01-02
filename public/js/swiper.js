const swiper = new Swiper(".main-banners .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
        delay: 10000,
    },
    slidesPerView: 2,
    spaceBetween: 10,
    breakpoints: {
        1600: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        320: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
    },
    // Responsive breakpoints
    //   breakpoints:
    //     // when window width is >= 320px
    //     320: {
    //       slidesPerView: 2,
    //       spaceBetween: 20
    //     },
    //     // when window width is >= 480px
    //     480: {
    //       slidesPerView: 3,
    //       spaceBetween: 30
    //     },
    //     // when window width is >= 640px
    //     640: {
    //       slidesPerView: 4,
    //       spaceBetween: 40
    //     },

    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },
});
