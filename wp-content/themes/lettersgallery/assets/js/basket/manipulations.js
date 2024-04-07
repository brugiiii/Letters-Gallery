import refs from "./refs"
import updateBuyButton from "../helpers/updateBuyButton"

const {basketWrapper, itemCountEl, cartButton, cardButtonPrice, cartCountEl} = refs
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
            const {productPrice, productsPrice, totalPrice, cartCount} = res.data;
            const priceEl = $(`.basket-price[data-id="${productId}"]`)
            const summaryItem = $(".summary-item span:last-child")
            const summaryTotal = $(".summary-total span:last-child")

            cartCountEl.text(cartCount)
            priceEl.html(productPrice)
            summaryItem.html(productsPrice)
            summaryTotal.html(totalPrice)
            cardButtonPrice.html(productsPrice)


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
            const {itemCount, basketMarkup, cartCount, totalPrice} = res.data
            const buyButton = $(`.products__buy[data-id="${productId}"]`)

            updateBuyButton("delete", buyButton)

            closestCard.removeClass("loading")

            cartCount === 0 ? cartButton.addClass("hidden") : cartButton.removeClass("hidden")

            itemCountEl.text(itemCount)
            cartCountEl.text(cartCount)
            cardButtonPrice.html(totalPrice)
            basketWrapper.html(basketMarkup)
        },
        error: (error) => console.log(error)
    });
}

basketWrapper.on("click", ".basket-products__delete", removeProductFromCart)
basketWrapper.on("click", ".counter__button", updateQuantity)