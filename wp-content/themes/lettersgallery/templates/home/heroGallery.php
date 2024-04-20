<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'class',
            'field' => 'id',
            'terms' => 62,
        ),
    ),
);

$query = new WP_Query($args);
if ($query->have_posts()) {
    ?>
    <div class="swiper hero-swiper h-100">
        <div class="swiper-wrapper">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                $post_thumbnail_id = get_post_thumbnail_id();
                $image_id = $post_thumbnail_id ?: 5;
                $image_url = wp_get_attachment_image_src($image_id, 'full');

                global $product;
                ?>
                <div class="swiper-slide">
                    <a class="position-relative d-block hero-gallery__item zoom-js" href="<?= get_permalink(); ?>"
                       style="background-image: url(<?= $image_url[0]; ?>)">
                        <?= wp_get_attachment_image($image_id, 'full', false, array('class' => 'products__image')); ?>
                        <span class="position-absolute fw-medium mb-0 text-white h4 hero-gallery__price"><?= $product->get_price_html(); ?></span>
                    </a>
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
