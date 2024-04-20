<section class="payment">
    <div class="container">
        <h1 class="h2 text-capitalize section-title mb-0">
            <?= the_field('title'); ?>
        </h1>
        <div class="grid-container">
            <?php
            the_content();
            get_template_part('templates/basket/summary');
            ?>
        </div>
    </div>
</section>