import refs from "./refs"

const {gallerySection, subMenu} = refs
const {home_url} = settings;

function handleButtonClick(e) {
    const $this = $(e.currentTarget)
    const catId = $this.data("cat-id")


    if (window.location.href === home_url) {
        const filterToActive = $(`.cat-list__button[data-cat-id="${catId}"]`)

        filterToActive.trigger("click")
        setTimeout(() => {
            gallerySection[0].scrollIntoView({behavior: 'smooth'})
        }, 0)
    } else {
        window.location.href = `${home_url}?catId=${catId}`
    }
}

subMenu.on("click", "button", handleButtonClick)

$("document").ready(function () {
    const params = new URLSearchParams(window.location.search);
    const catId = params.get('catId');

    if (catId) {
        const filterToActive = $(`.cat-list__button[data-cat-id="${catId}"]`)

        filterToActive.trigger("click")
        gallerySection[0].scrollIntoView({behavior: 'smooth'})
    }
});