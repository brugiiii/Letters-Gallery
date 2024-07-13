<div class="artists-wrapper">
    <?php
    $terms = get_terms(array(
        'taxonomy' => 'product_artist',
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        ?>
        <div id="artists-swiper" class="swiper">
            <ul class="swiper-wrapper artists-list">
                <?php
                foreach ($terms as $term) {
                    if ($term) {
                        get_template_part("templates/home/artistsItem", null, array("term" => $term));
                    }
                }
                ?>
            </ul>
        </div>
        <div class="controllers-wrapper d-flex justify-content-end">
            <?= get_template_part('templates/product/controllers'); ?>
        </div>
        <?php
    }
    ?>
</div>