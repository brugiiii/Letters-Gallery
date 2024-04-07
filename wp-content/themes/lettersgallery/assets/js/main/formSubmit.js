import refs from "./refs"

const {ajax_url} = settings;

function handleFormSubmit(e) {
    e.preventDefault()

    const formData = new FormData(e.currentTarget)
    const email = formData.get('email')


    const query = {
        action: "send_mail",
        email
    };

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: query,
        success: (res) => {
            console.log(res)
        },
        error: (error) => console.log(error)
    });
}

refs.footerFormEL.on("submit", handleFormSubmit)