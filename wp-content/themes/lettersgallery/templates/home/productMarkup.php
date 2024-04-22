<?php
$post_thumbnail_id = get_post_thumbnail_id();
$image_id = $post_thumbnail_id ?: 5;
$image_url = wp_get_attachment_image_src($image_id, 'full');
$product_id = get_the_ID();
$product_sizes = wp_get_post_terms($product_id, 'product_size');
$current_lang = pll_current_language();
$checkout_id = pll_get_post(8, $current_lang);

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

<div class="products__item position-relative">
    <a class="products__link" href="<?php the_permalink(); ?>">
        <div class="products__thumb zoom-js" style="background-image: url(<?= $image_url[0]; ?>)">
            <?= wp_get_attachment_image($image_id, 'full', false, array('class' => 'products__image')); ?>
        </div>
        <h3 class="h5 fw-semibold  mb-0 products__title">
            <?php the_title(); ?>
        </h3>
        <?php
        if (!empty($product_sizes) && !is_wp_error($product_sizes)) {
            ?>
            <span class="p3 d-inline-block products__size">
                <?= $size = $product_sizes[0]->name . " (cm)"; ?>
            </span>
            <?php
        }
        ?>
        <p class="h5 fw-semibold mb-0 products__price">
            <span>
                <?= translate_and_output("price"); ?>
            </span>
            <span>
                <?= wc_price(get_post_meta(get_the_ID(), "_regular_price", true)); ?>
            </span>
        </p>
    </a>
    <button type="button" class="p3 d-block w-100 fw-medium products__button products__buy border-0"
            data-add="<?= translate_and_output("add_to_cart"); ?>"
            data-delete="<?= translate_and_output("delete"); ?>"
            data-action="<?= $in_cart ? "delete" : "add"; ?>"
            data-id="<?= $product_id; ?>">
        <?= $in_cart ? translate_and_output("delete") : translate_and_output("add_to_cart"); ?>
    </button>
    <a href="<?= get_permalink($checkout_id); ?>"
       class="p3 d-block text-center fw-medium products__button products__checkout">
        <?= translate_and_output("checkout"); ?>
    </a>
    <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 bg-white"></div>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
</div>