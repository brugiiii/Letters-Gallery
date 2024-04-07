const hiddenContent = $(".legal-inner")
const button = $(".legal-button")

button.on("click", (e) => {
    button.toggleClass("active")
    hiddenContent.slideToggle()
})

import "../css/legal.scss";