<?php
$current_lang = pll_current_language();
$accessories_page_id = pll_get_post(114, $current_lang);
?>

<section class="hero">
    <div class="container p-0">
        <div class="hero-wrapper">
            <div class="hero-wrapper__item position-relative align-self-start">
                <?= get_template_part('templates/socials'); ?>
                <h1 class="h1 mb-0 hero-title">
                    <?= the_field('hero_title'); ?>
                </h1>
                <p class="p2 hero-text">
                    <?= the_field('hero_text'); ?>
                </p>
                <a class="h5 letter-spacing fw-normal mb-0 text-center d-block hero-button" href="#gallery">
                    <?= the_field('hero_button'); ?>
                </a>
                <a class="h5 letter-spacing fw-normal mb-0 text-center d-block hero-button" href="<?= get_permalink($accessories_page_id); ?>">
                    <?= the_field('hero_button_accessories'); ?>
                </a>
            </div>
            <div class="hero-gallery">
                <div class="gallery-wrapper position-relative h-100">
                    <?= get_template_part('templates/home/heroGallery'); ?>
                    <button class="gallery-wrapper__button position-absolute border-0 p-0 bg-transparent prev"
                            type="button">
                        <svg class="gallery-wrapper__icon" width="54" height="54">
                            <use href="<?php get_image('sprite.svg#caret-left'); ?>"></use>
                        </svg>
                    </button>
                    <button class="gallery-wrapper__button position-absolute border-0 p-0 bg-transparent next"
                            type="button">
                        <svg class="gallery-wrapper__icon" width="54" height="54">
                            <use href="<?php get_image('sprite.svg#caret-right'); ?>"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>