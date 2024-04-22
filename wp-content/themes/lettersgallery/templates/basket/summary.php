<?php
$link_visible = $args["link_visible"] ?? false;

$current_lang = pll_current_language();
$checkout_id = pll_get_post(8, $current_lang);

$cart_items = WC()->cart->get_cart();
$total_products = WC()->cart->get_cart_contents_total();
$shipping_total = WC()->cart->get_shipping_total();
?>

<div class="basket-total">
    <div class="summary ms-auto">
        <h3 class="h6 mb-0 fw-semibold">
            <?= translate_and_output("summary"); ?>
        </h3>
        <?php
        if (!empty($cart_items)) {
            foreach ($cart_items as $cart_item_key => $cart_item) {
                $product_name = $cart_item['data']->get_name();
                $product_price = wc_price($cart_item['line_total']);
                ?>
                <p class="summary-item p9 d-flex justify-content-between align-items-end">
                    <span><?= $product_name; ?></span>
                    <span class="text-uppercase fw-medium"><?= $product_price; ?></span>
                </p>
                <?php
            }
        }
        ?>
        <p class="summary-delivery p9 d-flex justify-content-between align-items-center">
            <span>
                <?= translate_and_output("delivery") ?>
            </span>
            <span class="text-uppercase fw-medium">
                <?= $shipping_total === "0" ? translate_and_output("free") : wc_price($shipping_total); ?>
            </span>
        </p>
        <h3 class="h7 mb-0 summary-total d-flex justify-content-between align-items-center">
            <span>
                <?= translate_and_output('total'); ?>
            </span>
            <span>
                <?= wc_price($total_products + $shipping_total); ?>
            </span>
        </h3>
        <?php
        if($link_visible){
            ?>
            <a class="summary-checkout d-block text-center fw-bold p3" href="<?= get_permalink($checkout_id); ?>" class="">
                <?= translate_and_output("checkout"); ?>
            </a>
        <?php
        }
        ?>
    </div>
</div>
