import refs from "./refs"

const {aboutButton, aboutTextItem, artistsListWrapper, artistsButton} = refs

function handleAboutButtonClick() {
    aboutButton.toggleClass("active")
    aboutTextItem.slideToggle()
}

function handleArtistsButtonClick() {
    artistsButton.toggleClass("active")
    artistsListWrapper.slideToggle()
}

aboutButton.on("click", handleAboutButtonClick)
artistsButton.on("click", handleArtistsButtonClick)