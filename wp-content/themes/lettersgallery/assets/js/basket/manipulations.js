import refs from "./refs"
import updateBuyButton from "../helpers/updateBuyButton"

const {basketWrapper, itemCountEl} = refs
const {ajax_url} = settings;

function updateQuantity(e) {
    const $this = $(e.currentTarget);
    const counterValueEl = $this.closest(".counter").find(".counter__value");
    const counterValue = Number(counterValueEl.text())

    if ($this.hasClass("decrement")) {
        if (counterValue === 1) return

        counterValueEl.text(counterValue - 1)
    } else {
        counterValueEl.text(counterValue + 1)
    }

    clearTimeout(updateQuantity.debounceTimer);
    updateQuantity.debounceTimer = setTimeout(() => {
        const productId = $this.data("product-id")
        const quantity = Number(counterValueEl.text())

        updateProductQuantity(productId, quantity, $this)
    }, 300);
}

function updateProductQuantity(productId, quantity, $this) {
    const closestCard = $this.closest(".basket-products__item")

    const query = {
        action: 'update_product_quantity',
        productId,
        quantity
    }

    closestCard.addClass("loading")

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: query,
        success: (res) => {
            const {productPrice, cartButtonMarkup, summaryMarkup} = res.data;
            const priceEl = $(`.basket-price[data-id="${productId}"]`)
            const summaryWrapper = $(".basket-total")
            const cartButton = $(".cart-button")

            priceEl.html(productPrice)
            summaryWrapper.replaceWith(summaryMarkup)
            cartButton.replaceWith(cartButtonMarkup)

            closestCard.removeClass("loading")
        },
        error: (error) => console.log(error)
    });
}

function removeProductFromCart(e) {
    const $this = $(e.currentTarget)
    const productId = $this.data("id")
    const closestCard = $this.closest(".basket-products__item")

    const query = {
        action: "manipulate_cart",
        cartAction: "delete",
        productId,
    };

    closestCard.addClass("loading")

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: query,
        success: (res) => {
            const {cartCount, basketMarkup, cartButtonMarkup} = res.data
            const buyButton = $(`.products__buy[data-id="${productId}"]`)
            const cartButton = $(".cart-button")

            updateBuyButton("delete", buyButton)

            closestCard.removeClass("loading")

            itemCountEl.text(cartCount)
            basketWrapper.html(basketMarkup)
            cartButton.replaceWith(cartButtonMarkup)
        },
        error: (error) => console.log(error)
    });
}

basketWrapper.on("click", ".basket-products__delete", removeProductFromCart)
basketWrapper.on("click", ".counter__button", updateQuantity)