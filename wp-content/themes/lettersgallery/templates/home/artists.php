<div class="artists-list grid-container">
    <?php
    $terms = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
        'exclude' => get_option('default_product_cat'),
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        $count = 0;
        foreach ($terms as $term) {
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            ?>
            <?php if ($count < 3) : ?>
                <div class="artists-list__item position-relative">
                    <div class="artists-list__thumb">
                        <?php
                        if ($thumbnail_id) {
                            echo wp_get_attachment_image($thumbnail_id, 'full', false, array('class' => ''));
                        }
                        ?>
                    </div>
                    <span class="h5 fw-medium text-uppercase mb-0 d-flex align-items-center artists-list__name">
                        <?php echo $term->name; ?>
                        <svg class="artists-list__icon" width="17" height="17">
                            <use href="<?php get_image('sprite.svg#arrow-right-bottom'); ?>"></use>
                        </svg>
                    </span>
                    <button type="button" class="position-absolute top-0 end-0 bottom-0 start-0 border-0 p-0 bg-transparent"
                            data-cat-id="<?= $term->term_id; ?>"></button>
                </div>
            <?php else : ?>
                <?php if ($count === 3) : ?>
                    <div class="artists-list__wrapper">
                <?php endif; ?>
                <div class="artists-list__item position-relative">
                    <div class="artists-list__thumb">
                        <?php
                        if ($thumbnail_id) {
                            echo wp_get_attachment_image($thumbnail_id, 'full', false, array('class' => ''));
                        }
                        ?>
                    </div>
                    <span class="h5 fw-medium text-uppercase mb-0 d-flex align-items-center artists-list__name">
                            <?php echo $term->name; ?>
                            <svg class="artists-list__icon" width="17" height="17">
                                <use href="<?php get_image('sprite.svg#arrow-right-bottom'); ?>"></use>
                            </svg>
                        </span>
                    <button type="button" class="position-absolute top-0 end-0 bottom-0 start-0 border-0 p-0 bg-transparent"
                            data-cat-id="<?= $term->term_id; ?>"></button>
                </div>
                <?php if ($count === count($terms) - 1) : ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php
            $count++;
        }
    }
    ?>
</div>
