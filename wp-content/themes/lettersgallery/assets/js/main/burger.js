import throttle from "lodash.throttle";
import {disableBodyScroll, enableBodyScroll} from "../utils/utils"
import refs from "./refs"

const {burgerButtonEl, burgerMenuEl, bodyEl} = refs

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

burgerButtonEl.on("click", throttle(handleButtonClick, 250))
burgerMenuEl.on("click", "a, button", handleButtonClick)