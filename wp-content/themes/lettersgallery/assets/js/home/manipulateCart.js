import refs from "./refs"
import updateBuyButton from "../helpers/updateBuyButton"

const {
    accessoriesWrapper,
    productsWrapper,
    buyButton,
    itemCountEl,
    basketWrapper,
} = refs
const {ajax_url} = settings;

function manipulateCart(e) {
    const $this = $(e.currentTarget)
    const productId = $this.data("id")
    const cartAction = $this.data("action")
    const closestCard = $this.closest(".products__item")
    const productsBuyButtons = $(".products__buy")

    const query = {
        action: "manipulate_cart",
        productId,
        cartAction,
    };


    closestCard.addClass("loading")
    productsBuyButtons.attr("disabled", true)

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: query,
        success: (res) => handleResponse($this, cartAction, closestCard, productsBuyButtons, res),
        error: (error) => console.log(error)
    });
}

function handleResponse($this, cartAction, closestCard, productsBuyButtons, res) {
    const {basketMarkup, cartCount, cartButtonMarkup} = res.data
    const cartButton = $(".cart-button")

    updateBuyButton(cartAction, $this)

    closestCard.removeClass("loading")
    productsBuyButtons.attr("disabled", false)

    itemCountEl.text(cartCount) //Counter in basket item:
    basketWrapper.html(basketMarkup)
    cartButton.replaceWith(cartButtonMarkup)
}

buyButton.on("click", manipulateCart)
accessoriesWrapper.on("click", ".products__buy", manipulateCart);
productsWrapper.on("click", ".products__buy", manipulateCart)