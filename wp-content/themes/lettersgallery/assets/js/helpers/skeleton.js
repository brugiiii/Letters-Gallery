export const productsSkeleton = (count = 4) => {
    return `
<div class="products">
    ${Array(count)
        .fill(`
            <div class="products__item skeleton">
                <div class="skeleton__thumb skeleton-animation"></div>
            
                <div class="skeleton__title skeleton-animation"></div>
                
                <div class="skeleton__size skeleton-animation"></div>
             
                <div class="skeleton__price skeleton-animation"></div>
                     
                <div class="skeleton__buy skeleton-animation"></div>
     
                <div class="skeleton__checkout skeleton-animation"></div>
            </div>`)
    .join('')}
</div>`
}