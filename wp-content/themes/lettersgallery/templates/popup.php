<?php
$current_lang = pll_current_language();
$post_id = pll_get_post(11, $current_lang);
?>

<div class="backdrop is-hidden" id="popup-backdrop">
    <div class="popup">
        <div class="popup-inner">
            <p class="popup-text text-center">
                <?= the_field('popup_text', $post_id); ?>
            </p>

            <form class="popup-form">
                <label class="popup-form__field">
                <span class="popup-form__title p4">
                    <?= translate_and_output('name'); ?>
                </span>
                    <input class="popup-form__input" name="username" type="text" required>
                </label>
                <label class="popup-form__field">
                <span class="popup-form__title p4">
                    <?= translate_and_output('email'); ?>
                </span>
                    <input class="popup-form__input" name="email" type="email" inputmode="email" required>
                </label>
                <button class="popup-form__button" type="submit">
                    <?= the_field('popup_button', $post_id); ?>
                </button>
            </form>
        </div>

        <div class="success-wrapper position-absolute top-0 end-0 bottom-0 start-0 text-center">
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

        <div class="popup-button-wrapper">
            <div class="hide-popup">
                <svg class="hide-popup__icon" width="22" height="22">
                    <use href="<?php get_image('sprite.svg#close'); ?>"></use>
                </svg>
            </div>
        </div>

        <div class="loader-wrapper position-absolute start-50 top-50 translate-middle">
            <div class="loader"></div>
        </div>
    </div>
</div>