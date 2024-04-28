<?php
add_action('admin_head', 'hide_product_description_field');
add_filter('manage_edit-product_columns', 'hide_product_columns');
function hide_product_description_field()
{
    global $post_type;
    if ($post_type == 'product') { // Перевіряємо, чи ми на сторінці редагування товару
        echo '<style>#postdivrich { display: none !important; }</style>';
    }
}

function hide_product_columns($columns)
{
    if (taxonomy_exists('product_cat')) {
        unset($columns['product_cat']);
    }
    if (taxonomy_exists('product_tag')) {
        unset($columns['product_tag']);
    }

    unset($columns['sku']);
    unset($columns['featured']);

    return $columns;
}
