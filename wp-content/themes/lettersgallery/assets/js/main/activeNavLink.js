import refs from "./refs"

const {navLine, navLinks} = refs

navLinks.on("mouseleave", () => navLine.css("opacity", 0))

navLinks.on("mouseenter", (e) => {
    navLine.css({
        "opacity": 1,
        "left": e.currentTarget.offsetLeft + "px"
    })
})