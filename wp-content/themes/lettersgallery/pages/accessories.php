<?php
/*
Template Name: Accessories
*/
?>

<?php get_header(); ?>

<main>
    <?=
    get_template_part('sections/heroSection');
    get_template_part('sections/home/gallerySection', null, array("class" => 63));
    ?>
</main>

<?php get_footer(); ?>