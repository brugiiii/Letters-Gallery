<?php
$products = $args["products"] ?? null;
$param = $args["param"] ?? null;

$terms = array();
if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();
        $product_categories = wp_get_post_terms(get_the_ID(), 'product_' . $param["taxonomy"]);
        foreach ($product_categories as $category) {
            $terms[$category->term_id] = $category->name;
        }
    }
    if($param["taxonomy"] === "size"){
        asort($terms);
    }

    wp_reset_postdata();
}
if (!empty($terms) && !is_wp_error($terms)) {
    ?>
    <h4 class="h5 fw-semibold gallery__title mb-0">
        <?= translate_and_output($param["translate"]); ?>
    </h4>
    <ul class="<?= $param["taxonomy"] . "-list nav-list"; ?>">
        <?php
        foreach ($terms as $key => $value) {
            ?>
            <li class="<?= $param["taxonomy"] . "-list__item nav-list__item"; ?>">
                <button type="button"
                        class="<?= $param["taxonomy"] . "-list__button nav-list__button p3 border-0 bg-transparent px-0"; ?>"
                    <?= 'data-' . $param["taxonomy"] . '-id="' . $key . '"'; ?>
                >

                    <?= $value; ?>
                </button>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>
