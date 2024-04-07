<section class="hero">
    <div class="container hero-container">
        <div class="hero-wrapper">
            <div class="align-self-center">
                <?= get_template_part('templates/socials'); ?>
                <h1 class="h1 mb-0 hero-title">
                    <?= the_field('hero_title'); ?>
                </h1>
                <p class="p2 hero-text">
                    <?= the_field('hero_text'); ?>
                </p>
                <a class="h5 letter-spacing fw-normal mb-0 d-flex align-items-center hero-button" href="#gallery">
                    <?= the_field('hero_button'); ?>
                    <svg class="hero-button__icon" width="24" height="24">
                        <use href="<?php get_image('sprite.svg#arrow-right-bottom'); ?>"></use>
                    </svg>
                </a>
            </div>
            <div class="hero-gallery">
                <div class="gallery-wrapper position-relative">
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