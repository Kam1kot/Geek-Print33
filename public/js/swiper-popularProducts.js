const swiper_popularProducts = new Swiper(".popular-product-list .swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: false,
    slidesPerView: 3,
    autoplay: {
        delay: 6000,
    },
    spaceBetween: 20,
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 15,
        },
        1560: {
            slidesPerView: 3,
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
