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
    ?>
</main>

<?php get_footer(); ?>

