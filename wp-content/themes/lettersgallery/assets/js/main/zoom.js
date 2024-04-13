import refs from "./refs"

const {bodyEl} = refs

function zoom(e){
    const zoomer = e.currentTarget;
    let offsetX, offsetY;

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

    const x = offsetX / zoomer.offsetWidth * 100;
    const y = offsetY / zoomer.offsetHeight * 100;
    zoomer.style.backgroundPosition = x + '% ' + y + '%';
}

bodyEl.on("mousemove", ".zoom-js", zoom)