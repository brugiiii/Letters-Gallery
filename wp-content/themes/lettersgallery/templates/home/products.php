<?php
$taxSlug = $_POST["taxSlug"] ?? "";
$taxObjects = $_POST["taxObjects"] ?? array();
$page = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
$class = $_POST["class"] ?? 62;
$order = $_POST["order"] ?? "";
$posts_per_page = 6;

$taxIds = array_column($taxObjects, 'id');

$args = array(
    "post_type" => "product",
    "posts_per_page" => $posts_per_page,
    "paged" => $page,
);

if ($order) {
    $args = array_merge($args, array(
        "orderby" => "meta_value_num",
        "meta_key" => "_price",
        "order" => $order
    ));
}


if (!empty($class)) {
    $args["tax_query"][] = array(
        "taxonomy" => "class",
        "field" => "id",
        "terms" => $class,
        "operator" => "IN",
    );
}

if (!empty($taxIds)) {
    $args['tax_query'][] = array(
        'taxonomy' => $taxSlug,
        'field' => 'id',
        'terms' => $taxIds,
        'operator' => 'IN',
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
