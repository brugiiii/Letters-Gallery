<?php
/*
Template Name: Basket
*/
?>

<?php get_header(); ?>

<main>
    <?php
    get_template_part("sections/basket/basketSection");
    get_template_part('sections/product/accessoriesSection');
    get_template_part("templates/scrollTop");
    ?>
</main>

<?php get_footer(); ?>

