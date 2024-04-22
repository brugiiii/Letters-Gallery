<?php
$categories = $_POST["categories"] ?? array();
$tags = $_POST["tags"] ?? array();
$sizes = $_POST["sizes"] ?? array();
$page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
$class = $_POST["class"] ?? 62;
$posts_per_page = 6;

// Захист від SQL-ін"єкцій
$tags = array_map("sanitize_text_field", $tags);

$args = array(
    "post_type" => "product",
    "posts_per_page" => $posts_per_page,
    "paged" => $page,
    "order" => "DESC"
);

if (!empty($class)) {
    $args["tax_query"][] = array(
        "taxonomy" => "class",
        "field" => "id",
        "terms" => $class,
        "operator" => "IN",
    );
}

if (!empty($categories)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'product_cat',
        'field' => 'id',
        'terms' => $categories,
        'operator' => 'IN',
    );
}

if (!empty($tags)) {
    $args["tax_query"][] = array(
        "taxonomy" => "product_tag",
        "field" => "id",
        "terms" => $tags,
        "operator" => "IN",
    );
}

if (!empty($sizes)) {
    $args["tax_query"][] = array(
        "taxonomy" => "product_size",
        "field" => "id",
        "terms" => $sizes,
        "operator" => "IN",
    );
}

$query = new WP_Query($args);

$response = array(
    "markup" => "",
    "pagination" => "",
);

if ($query->have_posts()) {
    ob_start();
    ?>
    <div class="products">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('templates/home/productMarkup');
        }
        ?>
    </div>
    <?php
    $response["markup"] = ob_get_clean();

    if ($query->max_num_pages > 1) {
        ob_start();

        get_template_part("templates/home/pagination", null, array("page" => $page, "query" => $query));

        $response["pagination"] = ob_get_clean();
    }
} else {
    ob_start();
    get_template_part("templates/no_products");
    $response["markup"] = ob_get_clean();
}

wp_die(json_encode($response));
