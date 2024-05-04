<?php
$current_lang = pll_current_language();
$accessories_id = pll_get_post(114, $current_lang);
?>

<section class="accessories">
    <div class="container">
        <h2 class="accessories-title text-capitalize fw-semibold h3">
            <?= translate_and_output("accessories"); ?>
        </h2>
        <div class="position-relative accessories-wrapper mx-auto">
            <?= get_template_part('templates/product/accessories'); ?>
            <?= get_template_part('templates/product/controllers'); ?>
        </div>
        <a class="p9 fw-medium d-block mx-auto text-center accessories-link" href="<?= get_permalink($accessories_id); ?>">
            <?= translate_and_output("all_accessories"); ?>
        </a>
    </div>
</section>