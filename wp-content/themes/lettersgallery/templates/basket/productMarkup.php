<?php
$quantity = $args["quantity"] ?? 1;
$image_id = get_post_thumbnail_id();
$total_price = $quantity * get_post_meta(get_the_ID(), "_regular_price", true);
$product_size = get_field("size");
$product_id = get_the_ID();
$product_class = get_the_terms($product_id, 'class');
?>

<li class="basket-products__item position-relative">
    <button type="button"
            class="top-0 end-0 border-0 bg-transparent p-0 basket-products__delete"
            data-action="delete"
            data-id="<?= get_the_ID(); ?>">
        <svg class="basket-products__icon" width="24" height="24">
            <use href="<?php get_image('sprite.svg#close'); ?>"></use>
        </svg>
    </button>
    <div class="basket-products__inner">
        <a href="<?= get_permalink(); ?>" class="basket-products__thumb d-block flex-shrink-0">
            <?php
            if ($image_id) {
                echo wp_get_attachment_image($image_id, 'full', false, array('class' => ''));
            } else {
                echo wp_get_attachment_image(5, 'full', false, array('class' => 'woocommerce-placeholder'));
            }
            ?>
        </a>
        <div class="d-flex flex-column flex-grow-1">
            <h3 class="h4 mb-0 fw-semibold basket-products__title">
                <?= translate_and_output($product_class[0]->slug === "painting" ? "painting" : "accessory"); ?>
            </h3>

            <p class="basket-product__name">
                <?php the_title(); ?>
            </p>

            <?php
            if ($product_size) {
                ?>
                <span class="p11 d-block basket-products__size">
                    <?= $product_size . " (cm)"; ?>
                </span>
                <?php
            }
            ?>

            <div class="counter-wrapper mt-auto">
                <?= get_template_part('templates/counter', null, array("count" => $quantity)); ?>
                <p class="h5 mb-0 basket-products__wrapper">
                    <span class="fw-normal">
                        <?= translate_and_output("price"); ?> :
                    </span>
                    <span class="basket-price fw-semibold" data-id="<?= get_the_ID(); ?>">
                        <?= wc_price($total_price); ?>
                    </span>
                </p>
            </div>
        </div>
    </div>
    <p class="h5 mb-0 basket-products__wrapper">
        <span class="fw-normal">
          <?= translate_and_output("price"); ?> :
        </span>
        <span class="basket-price fw-semibold" data-id="<?= get_the_ID(); ?>">
            <?= wc_price($total_price); ?>
        </span>
    </p>

    <div class="overlay position-absolute top-0 start-0 end-0 bottom-0 bg-white"></div>
    <div class="loader-wrapper position-absolute start-50 top-50 translate-middle">
        <div class="loader"></div>
    </div>
</li>