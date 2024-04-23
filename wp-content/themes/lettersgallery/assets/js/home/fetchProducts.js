import refs from "./refs"
import {productsSkeleton} from "../helpers/skeleton";

const {ajax_url} = settings;
const {
    productsWrapper, paginationWrapper, galleryNav, categoriesList, tagsList, sizesList, filterEl, clearAllButton
} = refs
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

function handleNavClick(e) {

    const $this = $(e.currentTarget)
    const catId = $this.data("cat-id")
    const tagId = $this.data("tag-id")
    const sizeId = $this.data("size-id")

    if (catId) {
        if (!query.categories.length) {
            filterEl.html("")
        }

        if ($this.hasClass("active")) {
            const catIndex = query.categories.indexOf(catId)
            query.categories.splice(catIndex, 1)
            $this.removeClass("active")

            filterEl.find(`button[data-cat-id="${catId}"]`).remove();
        } else {
            query.categories.push(catId)
            $this.addClass("active")

            filterEl.append(`<button data-cat-id="${catId}"><span>${$this.text()}</span></button>`);
        }

        query.tags = []
        query.sizes = []
        tagsList.find(".active").removeClass("active")
        sizesList.find(".active").removeClass("active")
    }

    if (tagId) {
        if (!query.tags.length) {
            filterEl.html("")
        }

        if ($this.hasClass("active")) {
            const tagIndex = query.tags.indexOf(tagId)
            query.tags.splice(tagIndex, 1)
            $this.removeClass("active")

            filterEl.find(`button[data-tag-id="${tagId}"]`).remove();
        } else {
            query.tags.push(tagId)
            $this.addClass("active")

            filterEl.append(`<button data-tag-id="${tagId}"><span>${$this.text()}</span></button>`);
        }

        query.sizes = []
        query.categories = []
        sizesList.find(".active").removeClass("active")
        categoriesList.find(".active").removeClass("active")
    }

    if (sizeId) {
        if (!query.sizes.length) {
            filterEl.html("")
        }

        if ($this.hasClass("active")) {
            const sizeIndex = query.sizes.indexOf(sizeId)
            query.sizes.splice(sizeIndex, 1)
            $this.removeClass("active")

            filterEl.find(`button[data-size-id="${sizeId}"]`).remove();
        } else {
            query.sizes.push(sizeId)
            $this.addClass("active")

            filterEl.append(`<button data-size-id="${sizeId}"><span>${$this.text()}</span></button>`);
        }

        query.tags = []
        query.categories = []
        tagsList.find(".active").removeClass("active")
        categoriesList.find(".active").removeClass("active")
    }

    fetchProducts()
}

function handleFilterClick(e) {
    const $this = $(e.currentTarget)
    const catId = $this.data("cat-id")
    const tagId = $this.data("tag-id")
    const sizeId = $this.data("size-id")

    if (catId) {
        const catIndex = query.categories.indexOf(catId)
        query.categories.splice(catIndex, 1)
        categoriesList.find(`button[data-cat-id=${catId}]`).removeClass("active")
        $this.remove()
    }

    if (tagId) {
        const catIndex = query.tags.indexOf(tagId)
        query.tags.splice(catIndex, 1)
        tagsList.find(`button[data-tag-id=${tagId}]`).removeClass("active")
        $this.remove()
    }

    if (sizeId) {
        const catIndex = query.sizes.indexOf(sizeId)
        query.sizes.splice(catIndex, 1)
        sizesList.find(`button[data-size-id=${sizeId}]`).removeClass("active")
        $this.remove()
    }

    fetchProducts()
}

function clearAll(){
    galleryNav.find(".active").removeClass("active")
    filterEl.html("")
    query.tags = []
    query.categories = []
    query.sizes = []
    fetchProducts()
}

galleryNav.on("click", ".nav-list__button", handleNavClick)
paginationWrapper.on("click", "button", paginationButtonClick)
filterEl.on("click", "button", handleFilterClick)
clearAllButton.on("click", clearAll)
document.addEventListener("DOMContentLoaded", () => {
    query.class = galleryNav.data("class-id")
    fetchProducts()
})