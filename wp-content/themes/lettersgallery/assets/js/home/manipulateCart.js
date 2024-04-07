import refs from "./refs"
import updateBuyButton from "../helpers/updateBuyButton"

const {
    accessoriesWrapper,
    productsWrapper,
    buyButton,
    cartCountEl,
    itemCountEl,
    basketWrapper,
    cartButton,
    cardButtonPrice
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
    const {basketMarkup, itemCount, cartCount, totalPrice} = res.data

    updateBuyButton(cartAction, $this)

    closestCard.removeClass("loading")
    productsBuyButtons.attr("disabled", false)

    cartCount === 0 ? cartButton.addClass("hidden") : cartButton.removeClass("hidden")
    cartCountEl.text(cartCount)
    itemCountEl.text(itemCount)
    basketWrapper.html(basketMarkup)
    cardButtonPrice.html(totalPrice)
}

buyButton.on("click", manipulateCart)
accessoriesWrapper.on("click", ".products__buy", manipulateCart);
productsWrapper.on("click", ".products__buy", manipulateCart)