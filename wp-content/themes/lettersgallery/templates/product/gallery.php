<?php
$product = wc_get_product();
$thumbnail_id = get_post_thumbnail_id();
$gallery_image_ids = $product->get_gallery_image_ids();
$gallery = [];

$add_image = function($id) {
    return ['id' => $id, 'url' => wp_get_attachment_image_url($id, 'full')];
};

$thumbnail_id ? $gallery[] = $add_image($thumbnail_id) : null;
foreach ($gallery_image_ids as $image_id) {
    $gallery[] = $add_image($image_id);
}

if (empty($gallery)) {
    $gallery[] = $add_image(5);
}
?>

<div class="gallery-container">
    <div class="swiper gallery-main">
        <ul class="swiper-wrapper">
            <?php
            foreach ($gallery as $image) {
                ?>
                <li class="swiper-slide">
                    <div class="h-100 gallery-main__thumb zoom-js" style="background-image: url(<?= $image["url"]; ?>)">
                        <?= wp_get_attachment_image($image["id"], 'full', false, array('class' => 'gallery-main__image')); ?>
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
            foreach ($gallery as $image) {
                ?>
                <li class="swiper-slide">
                    <div class="h-100 gallery-thumbs__thumb">
                        <?= wp_get_attachment_image($image["id"], 'full', false, array('class' => '')); ?>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>