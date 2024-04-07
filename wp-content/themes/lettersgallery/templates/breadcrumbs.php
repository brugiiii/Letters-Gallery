<?php
$current_lang = pll_current_language();
$home_page = pll_get_post(11, $current_lang);
?>

<div class="breadcrumb d-flex align-items-center mb-0">
    <a class="p8 text-uppercase breadcrumb__item" href="<?= pll_home_url(); ?>">
        <?= get_the_title($home_page); ?>
    </a>
    <svg class="separator" width="17" height="9">
        <use href="<?php get_image('sprite.svg#arrow-right'); ?>"></use>
    </svg>
    <span class="p8 text-uppercase current breadcrumb__item">
        <?php the_title() ?>
    </span>
</div>