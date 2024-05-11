import refs from "./refs"
import {showBackdrop, hideBackdrop} from "../utils/utils"

const {hidePopupButton, showPopupButton, popupBackdrop, popupForm} = refs
const {ajax_url} = settings;

function handleFormSubmit(e) {
    e.preventDefault();

    const $this = $(e.currentTarget)
    const telInput = $this.find('input[type="tel"]');

    const formData = Object.fromEntries(new FormData(e.currentTarget));
    const number = telInput.intlTelInput('getNumber');

    formData.phone_number = number

    const query = {
        action: "send_mail",
        formData
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