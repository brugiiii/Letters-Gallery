import refs from "./refs"

function handleTitleClick(e) {
    const $this = $(e.currentTarget)
    const navWrapper = $this.closest(".gallery-nav")
    const siblingsNavWrappers = navWrapper.siblings(".gallery-nav")
    const siblingsNavLists = siblingsNavWrappers.find(".nav-list")

    $this.next().slideToggle(500)
    siblingsNavLists.slideUp(500)

    navWrapper.toggleClass("active")
    siblingsNavWrappers.removeClass("active")
}

refs.galleryNav.on("click", ".gallery__title", handleTitleClick)