import refs from "./refs"

const {ajax_url} = settings;

function handleFormSubmit(e) {
    e.preventDefault()

    const $this = $(e.currentTarget)
    const formData = Object.fromEntries(new FormData(e.currentTarget));

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

refs.footerFormEL.on("submit", handleFormSubmit)