const swiper_products = new Swiper(".other-prds .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: false,
    slidesPerView: 4,
    spaceBetween: 15,
    breakpoints: {
        1920: {
            slidesPerView: 5,
            spaceBetween: 20,
        },
        1440: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
        320: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
    },
    // Responsive breakpoints
    //   breakpoints: {
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
});
