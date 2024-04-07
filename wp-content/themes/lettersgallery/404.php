<?php get_header(); ?>

<div class="container grid-container">
    <div class="error-wrapper">
        <h1 class="title">
        <span>
            <?= translate_and_output('oops'); ?>
        </span>
            <span>
            <?= translate_and_output('something_wrong'); ?>
        </span>
        </h1>
        <a class="link" href="<?= pll_home_url(); ?>">
            <?= translate_and_output('return_to_main'); ?>
        </a>
    </div>
</div>

<?php get_footer(); ?>
