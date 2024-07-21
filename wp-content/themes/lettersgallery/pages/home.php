<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="home-page">
    <?php
    get_template_part("sections/home/heroSection");
    get_template_part("sections/home/aboutSection");
    get_template_part("sections/home/artistsSection");
    get_template_part("sections/home/gallerySection");
    get_template_part('sections/product/accessoriesSection');
    get_template_part("templates/scrollTop");
    ?>
</main>

<?php get_footer(); ?>

