import throttle from "lodash.throttle";
import {disableBodyScroll, enableBodyScroll} from "../utils/utils"
import refs from "./refs"

const {burgerButtonEl, burgerMenuEl, menuButtonMob, bodyEl} = refs

const throttledHandleResize = throttle(handleResize, 200)

function handleResize() {
    if (window.innerWidth > 1024) handleButtonClick()
}

function handleButtonClick() {
    if (bodyEl.hasClass("menu-is-open")) {
        enableBodyScroll()

        window.removeEventListener("resize", throttledHandleResize)
    } else {
        disableBodyScroll()

        window.addEventListener("resize", throttledHandleResize)
    }

    bodyEl.toggleClass("menu-is-open")
}

function handleMenuButtonClick() {
    if (window.innerWidth > 1024) return;
    if (menuButtonMob.hasClass("active")) return;

    setTimeout(() => {
        $(document).on("click", handleDocumentClick);
    }, 0)

    menuButtonMob.toggleClass("active");
}

function handleDocumentClick(e) {
    if (!e.target.closest(".menu-item-has-children") || e.target === menuButtonMob[0]) {
        $(document).off("click", handleDocumentClick);

        menuButtonMob.toggleClass("active");
    }
}

menuButtonMob.on("click", handleMenuButtonClick)
burgerButtonEl.on("click", throttle(handleButtonClick, 250))
burgerMenuEl.on("click", "a, button:not(.nav-list__link)", handleButtonClick)