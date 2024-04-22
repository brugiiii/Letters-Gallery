import refs from "./refs"
import {productsSkeleton} from "../helpers/skeleton";

const {ajax_url} = settings;
const {productsWrapper, paginationWrapper, categoriesList, tagsList, sizesList} = refs
const query = {
    action: 'fetch_products',
    tags: [],
    categories: [],
    sizes: [],
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

function categoryClick(e) {
    const $this = $(e.currentTarget)
    const catId = $this.data("cat-id")

    if ($this.hasClass("active")) {
        const catIndex = query.categories.indexOf(catId)

        query.categories.splice(catIndex, 1)
        $this.removeClass("active")

        return fetchProducts()
    }

    query.categories.push(catId)
    $this.addClass("active")

    fetchProducts()
}

function tagClick(e) {
    const $this = $(e.currentTarget)
    const tagId = $this.data("tag-id")

    if ($this.hasClass("active")) {
        const tagIndex = query.tags.indexOf(tagId)

        query.tags.splice(tagIndex, 1)
        $this.removeClass("active")

        return fetchProducts()
    }

    query.tags.push(tagId)
    $this.addClass("active")

    fetchProducts()
}

function sizeClick(e) {
    const $this = $(e.currentTarget)
    const sizeId = $this.data("size-id")

    if ($this.hasClass("active")) {
        const sizeIndex = query.sizes.indexOf(sizeId)

        query.sizes.splice(sizeIndex, 1)
        $this.removeClass("active")

        return fetchProducts()
    }

    query.sizes.push(sizeId)
    $this.addClass("active")

    fetchProducts()
}

categoriesList.on("click", "button", categoryClick)
tagsList.on("click", "button", tagClick)
sizesList.on("click", "button", sizeClick)
paginationWrapper.on("click", "button", paginationButtonClick)

document.addEventListener("DOMContentLoaded", () => {
    query.class = categoriesList.data("class-id")
    fetchProducts()
})