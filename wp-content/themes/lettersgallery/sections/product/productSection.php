<?php
$product_id = get_the_ID();
$product_sizes = wp_get_post_terms($product_id, 'product_size');

$in_cart = false;
if (WC()->cart) {
    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] === $product_id) {
            $in_cart = true;
            break;
        }
    }
}
?>

<section class="product">
    <div class="container">
        <h1 class="h3 mb-0">
            <?php the_title(); ?>
        </h1>
        <div class="grid-container">
            <?= get_template_part('templates/product/gallery'); ?>
            <div class="d-flex flex-column product-wrapper">
                <?php
                if (!empty($product_sizes) && !is_wp_error($product_sizes)) {
                    ?>
                    <span class="h6 fw-medium">
                        <?= $size = $product_sizes[0]->name . " (cm)"; ?>
                    </span>
                    <?php
                }
                ?>
                <p class="d-flex my-0 products__price">
                    <span class="h6 fw-medium mb-0">
                      <?= translate_and_output("price"); ?> :
                    </span>
                    <span class="h7 fw-semibold">
                        <?= wc_price(get_post_meta(get_the_ID(), "_regular_price", true)); ?>
                    </span>
                </p>
                <?= the_field('description'); ?>
                <div class="product-inner mt-auto">
                    <button type="button" class="p3 d-block w-100 fw-medium products__button products__buy border-0"
                            data-add="<?= translate_and_output("add_to_cart"); ?>"
                            data-delete="<?= translate_and_output("delete"); ?>"
                            data-action="<?= $in_cart ? "delete" : "add"; ?>"
                            data-id="<?= $product_id; ?>">
                        <?= $in_cart ? translate_and_output("delete") : translate_and_output("add_to_cart"); ?>
                    </button>
                    <a href="<?= wc_get_checkout_url(); ?>"
                       class="p3 d-block text-center products__button products__checkout">
                        <?= translate_and_output("checkout"); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
