import refs from "./refs"
import throttle from "lodash.throttle"

const {scrollTop} = refs

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function scrollTopVisibility() {
    if (window.pageYOffset > 750) {
        scrollTop.removeClass("hidden")
    } else {
        scrollTop.addClass("hidden")
    }
}

$(window).on("scroll", throttle(scrollTopVisibility, 300))
scrollTop.on("click", scrollToTop)