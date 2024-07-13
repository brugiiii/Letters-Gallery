<?php
$term = $args['term'] ?? null;
$image = get_field("image", $term);

?>
    <li class="artists-list__item position-relative swiper-slide">
        <button type="button" class="artists-list__button d-block w-100 text-start border-0 p-0 bg-transparent "
                data-artist-id="<?= $term->term_id; ?>"
        >
            <span class="artists-list__thumb d-block zoom-js" style="background-image: url(<?= $image["url"]; ?>)">
                <?= wp_get_attachment_image($image["id"], 'full', false, array('class' => '')); ?>
            </span>
            <span class=" d-block fw-medium text-uppercase artists-list__name bg-transparent p-0 border-0"
               data-artist-id="<?= $term->term_id; ?>">
                <?= $term->name; ?>
            </span>
        </button>
    </li>
<?php
