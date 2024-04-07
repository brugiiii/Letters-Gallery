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
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                global $product;
                ?>
                <div class="swiper-slide">
                    <a class="position-relative d-block hero-gallery__item" href="<?= get_permalink(); ?>">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full');
                        } else {
                            echo wp_get_attachment_image(5, 'full', false, array('class' => 'woocommerce-placeholder'));
                        }
                        ?>
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
