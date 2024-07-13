import refs from "./refs"
import {productsSkeleton} from "../helpers/skeleton";
import {handleButtonClick, hideFilter} from "./mobileFilterVisibility"
import {logPlugin} from "@babel/preset-env/lib/debug";

const {ajax_url} = settings;
const {
    productsWrapper,
    paginationWrapper,
    galleryNav,
    filterEl,
    clearAllButton,
    navListButtons
} = refs
const query = {
    action: 'fetch_products',
    taxSlug: "",
    taxObjects: [],
    order: "",
    class: -1,
    page: 1
}

function fetchProducts() {

    const skeleton = productsSkeleton();
    productsWrapper.html(skeleton)

    $.ajax({
        url: ajax_url,
        type: 'post',
        data: query,
        success: renderProducts,
        error: (error) => console.log(error)
    });
}

function renderProducts(res) {

    const {markup, pagination} = JSON.parse(res)

    productsWrapper.html(markup)
    paginationWrapper.html(pagination)
}

function paginationButtonClick(e) {
    const $this = $(e.currentTarget)
    const dataPage = $this.data("page")

    query.page = dataPage
    fetchProducts()
}

function handleNavClick(e) {
    const $this = $(e.currentTarget)
    const taxSlug = $this.data("tax-slug")

    if (taxSlug === "price-order") {
        handleOrderClick($this)
        return
    }

    const taxId = $this.data("tax-id")

    if ($this.hasClass("active")) {
        const taxIndex = query.taxObjects.findIndex(obj => obj.id === taxId)
        query.taxObjects.splice(taxIndex, 1)

    } else {
        if (query.taxSlug !== taxSlug) {
            query.taxSlug = taxSlug
            query.taxObjects = [{id: taxId, text: $this.text()}]

            $(".nav-list__button.active:not([data-order])").removeClass("active");
        } else {
            query.taxObjects.push({id: taxId, text: $this.text()})
        }
    }

    $this.toggleClass("active")
    query.page = 1

    renderFilterButtons()
    fetchProducts()
}

function handleOrderClick($this) {
    if ($this.hasClass("active")) {
        query.order = ""
    } else {
        if (query.order) {
            const siblingButton = $this.parent().siblings().children()
            siblingButton.removeClass("active")
        }

        query.order = $this.data("order")
    }

    $this.toggleClass("active")

    fetchProducts()
}

function handleFilterClick(e) {
    const $this = $(e.currentTarget)
    const taxId = $this.data("tax-id")

    const taxIndex = query.taxObjects.findIndex(obj => obj.id === taxId)
    query.taxObjects.splice(taxIndex, 1)

    $(`.nav-list__button.active[data-tax-id="${taxId}"`).removeClass("active")

    setTimeout(() => {
        $this.remove()
    }, 0)

    query.page = 1

    fetchProducts()
}

function clearAll() {
    navListButtons.removeClass("active")
    filterEl.html("")
    query.taxObjects = []
}

function handleClearAllClick() {
    clearAll()
    fetchProducts()
}

function renderFilterButtons() {
    const buttonsMarkup = query.taxObjects.map(term => `
    <button data-tax-id="${term.id}"><span>${term.text}</span></button>`).join('');

    filterEl.html(buttonsMarkup)

    if (window.innerWidth < 1025) {
        hideFilter()
        handleButtonClick()
    }
}

galleryNav.on("click", ".nav-list__button", handleNavClick)
paginationWrapper.on("click", "button", paginationButtonClick)
filterEl.on("click", "button", handleFilterClick)
clearAllButton.on("click", handleClearAllClick)
document.addEventListener("DOMContentLoaded", () => {
    query.class = galleryNav.data("class-id")
    fetchProducts()
})