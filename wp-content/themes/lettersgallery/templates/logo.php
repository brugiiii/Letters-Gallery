<?php
if (has_custom_logo()) {
    the_custom_logo(array('class' => 'logo'));
} else {
    ?>
    <a class="logo fw-semibold" href="<?= pll_home_url(); ?>">
        <?= get_bloginfo('name'); ?>
    </a>
    <?php
}
?>