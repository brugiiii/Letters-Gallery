import refs from "./refs"
import {showBackdrop, hideBackdrop} from "../utils/utils"

const {hidePopupButton, showPopupButton, popupBackdrop, popupForm} = refs
const {ajax_url} = settings;

function handleFormSubmit(e) {
    e.preventDefault();

    const $this = $(e.currentTarget)

    const formData = new FormData(e.currentTarget)
    const name = formData.get('username')
    const email = formData.get('email')

    const query = {
        action: "send_mail",
        name,
        email
    };

    $this.addClass("loading")

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: query,
        success: (res) => {
            $this.addClass("success")
            $this.removeClass("loading")
        },
        error: (error) => console.log(error)
    });
}

popupForm.on("submit", handleFormSubmit)

showPopupButton.on("click", () => showBackdrop(popupBackdrop))
hidePopupButton.on("click", () => hideBackdrop(popupBackdrop))