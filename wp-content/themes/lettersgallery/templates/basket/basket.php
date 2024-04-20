<?php
$cart = WC()->cart;

if (!$cart->is_empty()) {
    get_template_part('templates/basket/products');

    get_template_part('templates/basket/summary', null, array("link_visible" => true));
} else {
    ?>
    <div class="empty-basket text-center">
        <div class="empty-basket__thumb mx-auto">
            <img src="<?= get_image("empty_basket.webp"); ?>" alt="Empty basket">
        </div>
        <h3 class="h3 empty-basket__title mb-0">
            <?= translate_and_output('no_products'); ?>
        </h3>
        <p class="empty-basket__text fw-normal mb-0 h5">
            <?= translate_and_output('empty_basket_text'); ?>
        </p>
    </div>
    <?php
}
?>

