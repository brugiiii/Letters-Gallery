<?php
$term = $args['term'] ?? null;
$image = get_field("image", $term);

if ($term) {
    ?>
    <div class="artists-list__item position-relative">
        <button type="button" class="artists-list__thumb border-0 p-0 bg-transparent zoom-js"
                data-artist-id="<?= $term->term_id; ?>"
                style="background-image: url(<?= $image["url"]; ?>)">
            <?= wp_get_attachment_image($image["id"], 'full', false, array('class' => '')); ?>
        </button>
        <button class="h5 fw-medium text-uppercase mb-0 artists-list__name bg-transparent p-0 border-0"
                data-artist-id="<?= $term->term_id; ?>">
            <?= $term->name; ?>
        </button>
    </div>
    <?php
}
