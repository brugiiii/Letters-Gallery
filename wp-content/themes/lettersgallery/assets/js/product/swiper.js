import Swiper from "swiper/bundle";
import "swiper/css/bundle";

const galleryThumbs = new Swiper(".gallery-thumbs", {
    centeredSlides: true,
    centeredSlidesBounds: true,
    grabCursor: true,
    slidesPerView: 3,
    spaceBetween: 11,
    breakpoints: {
        1025: {
            direction: 'vertical',
            spaceBetween: 14,
        }
    }
});

const galleryMain = new Swiper(".gallery-main", {
    grabCursor: true,
    thumbs: {
        swiper: galleryThumbs
    }
});

galleryMain.on('slideChangeTransitionStart', function () {
    galleryThumbs.slideTo(galleryMain.activeIndex);
});

galleryThumbs.on('transitionStart', function () {
    galleryMain.slideTo(galleryThumbs.activeIndex);
});

const accessoriesSwiper = new Swiper(".accessories-swiper", {
    slidesPerView: 1,
    spaceBetween: 22,
    grabCursor: true,
    loop: true,
    speed: 800,
    breakpoints: {
        1025: {
            slidesPerView: 3,
            spaceBetween: 35,
        }
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    touchEventsTarget: "container",
    navigation: {
        prevEl: ".accessories-wrapper .prev",
        nextEl: ".accessories-wrapper .next",
    }
})