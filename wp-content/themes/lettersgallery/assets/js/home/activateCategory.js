import refs from "./refs"

const {artistsList} = refs
const {home_url} = settings;

function handleButtonClick(e) {
    const $this = $(e.currentTarget)
    const catId = $this.data("artist-id")

    window.location.href = `${home_url}?artistId=${catId}`
}

artistsList.on("click", "button", handleButtonClick)