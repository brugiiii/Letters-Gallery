<?php
/*
Template Name: Accessories
*/
?>

<?php get_header(); ?>

<main>
    <?=
    get_template_part('sections/home/gallerySection', null, array("class" => 63, "breadcrumbs" => true));
    get_template_part("templates/scrollTop");
    ?>
</main>

<?php get_footer(); ?>