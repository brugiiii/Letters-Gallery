import refs from "./refs"

const {ajax_url} = settings;

function handleFormSubmit(e) {
    e.preventDefault()

    const $this = $(e.currentTarget)
    const formData = new FormData(e.currentTarget)
    const email = formData.get('email')

    const query = {
        action: "send_mail",
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

refs.footerFormEL.on("submit", handleFormSubmit)