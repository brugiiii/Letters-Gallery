import refs from "./refs"

const {bodyEl} = refs

let animationFrame
let offsetX
let offsetY
let currentTarget

function handleMouseEnter(e) {
    currentTarget = e.currentTarget

    currentTarget.addEventListener("mousemove", handleMouseMove)
    animationFrame = requestAnimationFrame(animateBackground)
}

function handleMouseLeave(e) {
    currentTarget = e.currentTarget
    currentTarget.removeEventListener("mousemove", handleMouseMove)

    window.cancelAnimationFrame(animationFrame)
}

function handleMouseMove(e){
    if (e.offsetX !== undefined) {
        offsetX = e.offsetX;
    } else {
        offsetX = e.touches[0].pageX;
    }

    if (e.offsetY !== undefined) {
        offsetY = e.offsetY;
    } else {
        offsetY = e.touches[0].pageY;
    }
}

function animateBackground() {
    animationFrame = requestAnimationFrame(animateBackground)

    const x = offsetX / currentTarget.offsetWidth * 100;
    const y = offsetY / currentTarget.offsetHeight * 100;
    currentTarget.style.backgroundPosition = x + '% ' + y + '%';
}

bodyEl.on("mouseenter", ".zoom-js", handleMouseEnter)
bodyEl.on("mouseleave", ".zoom-js", handleMouseLeave)