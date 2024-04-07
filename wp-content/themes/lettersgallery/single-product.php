<?php get_header(); ?>

<main>
    <?=
    get_template_part('sections/heroSection');
    get_template_part('sections/product/productSection');
    get_template_part('sections/product/accessoriesSection');
    get_template_part("templates/scrollTop");
    ?>
</main>

<?php get_footer(); ?>
