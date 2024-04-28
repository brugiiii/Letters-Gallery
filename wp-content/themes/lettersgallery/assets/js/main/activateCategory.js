import refs from "./refs"

const {gallerySection, subMenu} = refs
const {home_url} = settings;

function handleButtonClick(e) {
    const $this = $(e.currentTarget)
    const artistId = $this.data("artist-id")

    if (window.location.href === home_url) {
        setActiveArtist(artistId)
    } else {
        window.location.href = `${home_url}?artistId=${artistId}`
    }
}

function setActiveArtist(id) {
    const filterToActive = $(`.nav-list__button[data-tax-id="${id}"]`)
    if(!filterToActive[0]) return

    filterToActive.trigger("click")

    setTimeout(() => {
        gallerySection[0].scrollIntoView({behavior: 'smooth'})
    }, 0)
}

subMenu.on("click", "button", handleButtonClick)

$("document").ready(function () {
    const params = new URLSearchParams(window.location.search);
    const artistId = params.get('artistId');

    if (!artistId) return

    setActiveArtist(artistId)
});