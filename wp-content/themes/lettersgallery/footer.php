<?php
$current_lang = pll_current_language();
$privacy_policy_id = pll_get_post(3, $current_lang);
$terms_of_use_id = pll_get_post(261, $current_lang);
?>

<?php if (!is_404()) {
    ?>
    <footer class="footer">
        <div class="container">
            <div class="grid-container">
                <div class="footer-inner">
                    <?= get_template_part('templates/logo'); ?>
                    <p class="p6 text-white footer-text">
                        <?php the_field("sides_left_text"); ?>
                    </p>
                    <form class="position-relative footer-form">
                        <input class="p7 w-100 h-100 border-0 footer-form__input" type="email" inputmode="email"
                               placeholder="<?= translate_and_output("email"); ?>" name="email" required/>
                        <button class="position-absolute top-50 translate-middle-y border-0 rounded-circle footer-form__button"
                                type="submit">
                            <svg class="position-absolute top-50 start-50 footer-form__icon" width="27"
                                 height="12">
                                <use href="<?php get_image('sprite.svg#arrow-right'); ?>"></use>
                            </svg>
                            <svg class="position-absolute top-50 start-50 footer-form__success-icon" width="20" height="16">
                                <use href="<?php get_image('sprite.svg#success'); ?>"></use>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="footer-inner">
                    <p class="p3 text-white fw-semibold text-uppercase">
                        <?= the_field("sides_title"); ?>
                    </p>
                    <p class="p5 fw-light footer-text">
                        <?= the_field("sides_right_text"); ?>
                    </p>
                    <?= get_template_part('templates/contacts'); ?>
                </div>
                <div class="footer-inner">
                    <?= get_template_part('templates/socials', null, array("color" => "accent")); ?>
                </div>
            </div>
            <div class="grid-container footer-wrapper">
                <div class="footer-inner">
               <span class="p7 copyright">
                   Copyright &#169; <?= date('Y') . " " . get_bloginfo('name'); ?>
               </span>
                </div>
                <div class="footer-inner">
                    <a class="p4 letter-spacing footer-link" href="<?= get_permalink($privacy_policy_id); ?>">
                        <?= get_the_title($privacy_policy_id); ?>
                    </a>
                    <a class="p4 letter-spacing footer-link" href="<?= get_permalink($terms_of_use_id); ?>">
                        <?= get_the_title($terms_of_use_id); ?>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <?php
} ?>



<?php
if (!is_404()) get_template_part("templates/burgerMenu");

wp_footer();

?>

</body>

</html>