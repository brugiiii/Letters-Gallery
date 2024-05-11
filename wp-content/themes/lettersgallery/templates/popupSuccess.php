<div class="success-wrapper text-center">
    <p class="success-title">
        <?= the_field('popup_success_title'); ?>
    </p>
    <p class="success-text">
        <?= the_field('popup_success_text'); ?>
    </p>
    <svg class="success-icon" width="75" height="75">
        <use href="<?php get_image('sprite.svg#popup-success'); ?>"></use>
    </svg>
</div>