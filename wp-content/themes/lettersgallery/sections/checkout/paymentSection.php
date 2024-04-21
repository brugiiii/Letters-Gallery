<section class="payment">
    <div class="container">
        <?= get_template_part('templates/breadcrumbs'); ?>
        <h1 class="h2 section-title hide-mob mb-0">
            <?= the_field('title'); ?>
        </h1>
        <div class="grid-container">
            <?php the_content(); ?>
            <h1 class="h2 section-title hide-desk mb-0">
                <?= the_field('title'); ?>
            </h1>
            <?= get_template_part('templates/basket/summary'); ?>
        </div>
    </div>
</section>