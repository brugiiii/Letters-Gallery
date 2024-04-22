<div class="artists-list grid-container">
    <?php
    $terms = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        $count = 0;
        foreach ($terms as $term) {
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            if ($count < 3) :
                get_template_part("templates/home/artistsItem", null, array("term" => $term));
            else :
                if ($count === 3) :
                    echo '<div class="artists-list__wrapper">';
                endif;
                get_template_part("templates/home/artistsItem", null, array("term" => $term));
                if ($count === count($terms) - 1) :
                    echo '</div>';
                endif;
            endif;
            $count++;
        }
    }
    ?>
</div>