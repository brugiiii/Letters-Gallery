<?php
/*
Template Name: Checkout
*/
?>

<?php get_header(); ?>

<main>
    <?=
    get_template_part('sections/heroSection');
    get_template_part('sections/checkout/paymentSection');
    get_template_part("templates/scrollTop");
    ?>
</main>

<?php get_footer(); ?>

