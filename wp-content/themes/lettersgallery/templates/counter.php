<?php
$count = $args["count"] ?? "1";
$product_id = get_the_ID();
$product_class = get_the_terms($product_id, 'class');
if ($product_class[0]->slug === "painting") return
?>

<div class="counter flex-shrink-0">
    <button class="counter__button d-flex align-items-center justify-content-center bg-transparent border-0 increment"
            data-product-id="<?= get_the_ID(); ?>">
        <svg class="counter__icon" width="17" height="17">
            <use href="<?php get_image('sprite.svg#plus'); ?>"></use>
        </svg>
    </button>
    <span class="counter__value h7 fw-medium">
        <?= $count; ?>
    </span>
    <button class="counter__button d-flex align-items-center justify-content-center bg-transparent border-0 decrement"
            data-product-id="<?= get_the_ID(); ?>">
        <svg class="counter__icon" width="17" height="1">
            <use href="<?php get_image('sprite.svg#minus'); ?>"></use>
        </svg>
    </button>
</div>