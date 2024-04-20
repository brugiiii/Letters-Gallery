<?php
$home_page_id = pll_get_post(11, pll_current_language());
$class = $args["class"] ?? 62;
$breadcrumbs = $args["breadcrumbs"] ?? false;

$params = array(
    array(
        "taxonomy" => "cat",
        "translate" => "artists"
    ), array(
        "taxonomy" => "tag",
        "translate" => "subject_matter"
    ))
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
                    <svg class="gallery-aside__icon" width="28" height="27">
                        <use href="<?php get_image('sprite.svg#filter'); ?>"></use>
                    </svg>
                </div>
                <div class="gallery-nav-wrapper">
                    <?php
                    foreach ($params as $param) {
                        ?>
                        <div class="gallery-nav">
                            <h4 class="h5 fw-semibold gallery__title mb-0">
                                <?= translate_and_output($param["translate"]); ?>
                            </h4>

                            <?= get_template_part("templates/home/taxonomyList", null, array("taxonomy" => $param["taxonomy"], "class" => $class)); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </aside>
            <div class="gallery-wrapper">
                <div class="products-wrapper"></div>
                <div class="pagination-wrapper"></div>
            </div>
        </div>
    </div>
</section>