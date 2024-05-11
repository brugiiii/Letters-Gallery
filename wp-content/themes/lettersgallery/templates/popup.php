<div class="backdrop is-hidden" id="popup-backdrop">
    <div class="popup">

        <?=
        get_template_part('templates/popupForm');
        get_template_part('templates/popupSuccess');
        ?>

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