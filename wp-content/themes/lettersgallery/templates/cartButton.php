<?php
$current_lang = pll_current_language();
$basket_id = pll_get_post(124, $current_lang);
$cart_count = WC()->cart->get_cart_contents_count();
?>

<a href="<?= get_permalink($basket_id); ?>"
   class="cart-button d-flex align-items-center gap-2 <?= $cart_count === 0 ? " hidden" : ""; ?>"
   type="button">
    <span class="card-button__price fw-medium">
        <?= wc_price(WC()->cart->get_cart_contents_total()); ?>
    </span>
    <div class="cart-button__wrapper position-relative">
        <svg class="card-button__icon" width="28" height="28">
            <use href="<?php get_image('sprite.svg#basket'); ?>"></use>
        </svg>
        <span class="p8 letter-spacing position-absolute top-0 end-0 text-white rounded-circle text-center cart-count">
            <?= $cart_count; ?>
        </span>
    </div>
</a>