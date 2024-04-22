$(document).ready(function() {
    const container = $('.gallery-nav-inner');

    container.on('scroll', function() {
        isScrollActive(container);
    });

    isScrollActive(container)
});

function isScrollActive(container) {
    if (container.prop('scrollHeight') > container.innerHeight()) {
        container.addClass('scroll-active');
    } else {
        container.removeClass('scroll-active');
    }
}
