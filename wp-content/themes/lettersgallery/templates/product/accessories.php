<?php
$current_product_id = get_the_ID();
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'class',
            'field' => 'id',
            'terms' => 63,
        ),
    ),
);

$query = new WP_Query($args);
if ($query->have_posts()) {
    ?>
    <div class="swiper accessories-swiper">
        <div class="swiper-wrapper">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                global $product;

                if (get_the_ID() === $current_product_id) continue
                ?>
                <div class="swiper-slide accessories-slide">
                    <?= get_template_part('templates/home/productMarkup'); ?>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php
}
?>
