<?php
$term = $args['term'] ?? null;
$image_id = get_term_meta($term->term_id, 'thumbnail_id', true);
$image_src = wp_get_attachment_image_src($image_id, 'full');

if ($term) {
    ?>
    <div class="artists-list__item position-relative">
        <button type="button" class="artists-list__thumb border-0 p-0 bg-transparent zoom-js"
                data-cat-id="<?= $term->term_id; ?>"
                style="background-image: url(<?= $image_src[0]; ?>)">
            <?php
            if ($image_id) {
                echo wp_get_attachment_image($image_id, 'full', false, array('class' => ''));
            }
            ?>
        </button>
        <button class="h5 fw-medium text-uppercase mb-0 artists-list__name bg-transparent p-0 border-0"
                data-cat-id="<?= $term->term_id; ?>">
            <?= $term->name; ?>
        </button>
    </div>
    <?php
}
