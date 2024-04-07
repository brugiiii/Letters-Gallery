<?php
$taxonomy = $args["taxonomy"] ?? "cat";
$class = $args["class"] ?? 62;
?>

<ul class="<?= $taxonomy . "-list nav-list"; ?>" data-class-id="<?= $class; ?>">
    <?php
    $terms = get_terms(array(
        'taxonomy' => "product_" . $taxonomy,
        'hide_empty' => false,
        'exclude' => get_option('default_product_' . $taxonomy),
    ));

    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            ?>
            <li class="<?= $taxonomy . "-list__item nav-list__item"; ?>">
                <button type="button"
                        class="<?= $taxonomy . "-list__button nav-list__button p3 border-0 bg-transparent px-0"; ?>"
                    <?= 'data-' . $taxonomy . '-id="' . $term->term_id . '"'; ?>
                >
                    <?= $term->name; ?>
                </button>
            </li>
            <?php
        }
    }
    ?>
</ul>
