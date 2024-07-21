<?php
$home_page_id = pll_get_post(11, pll_current_language());
$class = $args["class"] ?? 62;
$breadcrumbs = $args["breadcrumbs"] ?? false;

$params = $class === 62 ? ["artist", "subject_matter", "size"] : ["female_accessories", "male_accessories", "home_and_accessories"];

$query = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'class',
            'field' => 'id',
            'terms' => $class,
        ),
    ),
);

$products = new WP_Query($query);
?>

<section class="gallery" id="gallery">
    <div class="container">
        <?php if ($breadcrumbs) get_template_part('templates/breadcrumbs') ?>
        <h2 class="h2 section-title mb-0">
            <?= the_field("gallery_title"); ?>
        </h2>
        <div class="grid-container">
            <aside class="gallery-aside align-self-start">
                <div class="gallery-aside__wrapper">
                    <h3 class="gallery-aside__title h4 mb-0 fw-semibold">
                        <?= the_field("filter_title", $home_page_id); ?>
                    </h3>
                    <button type="button" class="gallery-aside__button d-flex border-0 p-0">
                        <svg class="gallery-aside__icon" width="28" height="27">
                            <use href="<?php get_image('sprite.svg#filter'); ?>"></use>
                        </svg>
                    </button>
                </div>
                <div class="gallery-nav-wrapper">
                    <button type="button" class="gallery-nav-close border-0 p-0 bg-transparent position-absolute">
                        <svg class="gallery-nav-icon" width="18" height="18">
                            <use href="<?php get_image('sprite.svg#close'); ?>"></use>
                        </svg>
                    </button>
                    <div class="filter-wrapper">
                        <button type="button"
                                class="filter-wrapper__button text-start p3 fw-semibold text-capitalize p-0 bg-transparent border-0">
                            <?= translate_and_output('clear_all'); ?>
                        </button>
                        <div class="filter"></div>
                    </div>
                    <div class="gallery-nav-inner" data-class-id="<?= $class; ?>">
                        <?php
                        foreach ($params as $index => $param) {
                            ?>
                            <div class="gallery-nav <?= $index === 0 ? "active" : ""; ?>">
                                <?= get_template_part("templates/home/taxonomyList", null, array("param" => $param, "products" => $products, "index" => $index)); ?>
                            </div>
                            <?php
                        }
                        get_template_part("templates/home/orderList");
                        ?>
                    </div>
                </div>
            </aside>
            <div class="gallery-wrapper">
                <div class="products-wrapper"></div>
                <div class="pagination-wrapper"></div>
            </div>
        </div>
    </div>
</section>