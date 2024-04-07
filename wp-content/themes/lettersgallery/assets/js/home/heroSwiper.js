import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const heroSwiper = new Swiper(".hero-swiper", {
    slidesPerView: 1,
    grabCursor: true,
    loop: true,
    navigation: {
        prevEl: ".gallery-wrapper .prev",
        nextEl: ".gallery-wrapper .next",
    },
});