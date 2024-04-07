import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const heroSwiper = new Swiper(".hero-swiper", {
    allowTouchMove: false,
    speed: 1000,
    effect: "fade",
    autoplay: {
        delay: 5000
    }
})