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

const artistsSwiper = new Swiper("#artists-swiper", {
    slidesPerView: 1.5429,
    spaceBetween: 20,
    slidesOffsetBefore: 16,
    grabCursor: true,
    loop: true,
    breakpoints: {
        1025: {
            slidesPerView: 4,
            slidesOffsetBefore: 0,
            spaceBetween: 40,
        }
    },
    navigation: {
        prevEl: ".artists .prev",
        nextEl: ".artists .next",
    },
})