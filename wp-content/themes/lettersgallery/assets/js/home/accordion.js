import refs from "./refs"

const {galleryNav, galleryTitles} = refs

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

function setTitlesWidth() {
    let longestTitle = galleryTitles[0].getBoundingClientRect().width;
    const slicedTitles = Array.from(galleryTitles).slice(1);

    if (!slicedTitles || slicedTitles.length === 0) return;

    slicedTitles.forEach(title => {
        const titleWidth = title.getBoundingClientRect().width

        if (titleWidth <= longestTitle) return
            longestTitle = titleWidth;
    });

    galleryNav[0].style.setProperty('--title-width', `${longestTitle}px`);
}


galleryNav.on("click", ".gallery__title", handleTitleClick)

setTitlesWidth()