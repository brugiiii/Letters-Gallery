import refs from "./refs"

const {mobileFilterButton} = refs

function handleButtonClick() {
    if (mobileFilterButton.hasClass("active")) return;

    setTimeout(() => {
        $(document).on("click", handleDocumentClick);
    }, 0)

    mobileFilterButton.toggleClass("active");
}

function handleDocumentClick(e) {
    if (!e.target.closest(".gallery-nav-wrapper") || e.target === mobileFilterButton[0]) {
        $(document).off("click", handleDocumentClick);

        mobileFilterButton.toggleClass("active");
    }
}

mobileFilterButton.on("click", handleButtonClick)