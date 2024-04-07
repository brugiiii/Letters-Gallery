<?php
$product = wc_get_product();
$thumbnail_id = get_post_thumbnail_id();
$gallery_image_ids = $product->get_gallery_image_ids();

if ($thumbnail_id || !empty($gallery_image_ids)) {
    $gallery = [$thumbnail_id, ...$gallery_image_ids];
} else {
    $gallery = [5];
}
?>

<div class="gallery-container">
    <div class="swiper gallery-main">
        <ul class="swiper-wrapper">
            <?php
            foreach ($gallery as $image_id) {
                ?>
                <li class="swiper-slide">
                    <div class="h-100 gallery-main__thumb">
                        <?= wp_get_attachment_image($image_id, 'full', false, array('class' => '')); ?>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="swiper gallery-thumbs">
        <ul class="swiper-wrapper">
            <?php
            foreach ($gallery as $image_id) {
                ?>
                <li class="swiper-slide">
                    <div class="h-100 gallery-thumbs__thumb">
                        <?= wp_get_attachment_image($image_id, 'full', false, array('class' => '')); ?>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>