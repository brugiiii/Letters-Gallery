import throttle from "lodash.throttle";
import {disableBodyScroll, enableBodyScroll} from "../utils/utils"
import refs from "./refs"

const {burgerButtonEl, burgerMenuEl} = refs

const throttledHandleResize = throttle(handleResize, 200)

function handleResize() {
    if (window.innerWidth > 1024) handleButtonClick()
}

function handleButtonClick() {
    if (burgerButtonEl.hasClass("active")) {
        enableBodyScroll()

        window.removeEventListener("resize", throttledHandleResize)
    } else {
        disableBodyScroll()

        window.addEventListener("resize", throttledHandleResize)
    }

    burgerButtonEl.toggleClass("active")
    burgerMenuEl.toggleClass("hidden")

    window.scroll({
        top: 0,
        behavior: "smooth"
    })
}

burgerButtonEl.on("click", throttle(handleButtonClick, 250))
burgerMenuEl.on("click", "a, button", handleButtonClick)