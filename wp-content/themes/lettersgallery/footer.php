<?php
$current_lang = pll_current_language();
$pages = [3, 261, 277];
$post_id = pll_get_post(11, $current_lang);
?>

<?php if (!is_404()) {
    ?>
    <footer class="footer">
        <div class="container">
            <div class="grid-container">
                <div class="footer-inner">
                    <?= get_template_part('templates/logo'); ?>
                    <p class="p6 text-white footer-text">
                        <?php the_field("sides_left_text", $post_id); ?>
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
                            <svg class="position-absolute top-50 start-50 footer-form__success-icon" width="20"
                                 height="16">
                                <use href="<?php get_image('sprite.svg#success'); ?>"></use>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="footer-inner">
                    <p class="p3 text-white fw-semibold text-uppercase">
                        <?= the_field("sides_title", $post_id); ?>
                    </p>
                    <p class="p5 fw-light footer-text">
                        <?= the_field("sides_right_text", $post_id); ?>
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
                    <?php
                    foreach ($pages as $page) {
                        $page_id = pll_get_post($page, $current_lang);
                        ?>
                        <a class="p4 letter-spacing footer-link" href="<?= get_permalink($page_id); ?>">
                            <?= get_the_title($page_id); ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <?php
}
if (!is_404()) {
    get_template_part("templates/burgerMenu");
    get_template_part("templates/popup");
}

wp_footer();

?>

</body>

</html>