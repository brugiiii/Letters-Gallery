<section class="basket">
    <div class="container">
       <?= get_template_part("templates/breadcrumbs"); ?>

        <h2 class="h2 section-title mb-0">
            <?= the_field("title"); ?>
        </h2>

        <p class="d-flex align-items-center basket-count">
            <span class="h5 fw-normal mb-0">
                <?= translate_and_output("item") . " :"; ?>
            </span>
            <span class="item-count p10 fw-medium">
                <?= get_template_part("templates/basket/itemCount"); ?>
            </span>
        </p>

        <div class="basket-wrapper grid-container">
            <?= get_template_part("templates/basket/basketMarkup"); ?>
        </div>
    </div>
</section>
