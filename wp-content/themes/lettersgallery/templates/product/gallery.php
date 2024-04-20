<?php
$product = wc_get_product();
$thumbnail_id = get_post_thumbnail_id();
$gallery_image_ids = $product->get_gallery_image_ids();

if ($thumbnail_id || !empty($gallery_image_ids)) {
    $gallery = [];

    if ($thumbnail_id) {
        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'full');
        $gallery[] = ['id' => $thumbnail_id, 'url' => $thumbnail_url];
    }

    foreach ($gallery_image_ids as $image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        $gallery[] = ['id' => $image_id, 'url' => $image_url];
    }
} else {
    $gallery = [['id' => 5, 'url' => wp_get_attachment_image_src(5, 'full')]];
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