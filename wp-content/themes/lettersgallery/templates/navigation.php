<?php
$location = $args["location"] ?? "menu-header";
$menu_locations = get_nav_menu_locations();
$menu_id = $menu_locations[$location];
$menu = wp_get_nav_menu_items($menu_id);
?>
<ul class="nav-list">
    <?php
    foreach ($menu as $menu_item) {
        if ($menu_item->menu_item_parent == 0) {
            $has_children = false;
            foreach ($menu as $child_menu_item) {
                if ($child_menu_item->menu_item_parent == $menu_item->ID) {
                    $has_children = true;
                    break;
                }
            }
            ?>
            <li <?= $has_children ? ' class="position-relative menu-item-has-children" ' : '' ?>>
                <a href="<?= $menu_item->url ?>">
                    <?= $menu_item->title ?>
                    <?php
                    if ($has_children) {
                        ?>
                        <svg class="menu-item__icon" width="18" height="11">
                            <use href="<?= get_image('sprite.svg#arrow-down'); ?>"></use>
                        </svg>
                        <?php
                    }
                    ?>
                </a>
                <?php
                if ($has_children) {
                    ?>
                    <ul class="position-absolute start-0 bg-white sub-menu">
                        <?php
                        foreach ($menu as $child_menu_item) {
                            if ($child_menu_item->menu_item_parent == $menu_item->ID) {
                                $category_id = get_post_meta($child_menu_item->ID, '_menu_item_object_id', true);
                                ?>
                                <li>
                                    <button class="bg-transparent border-0" type="button"
                                            data-cat-id="<?= $category_id ?>"
                                            href="<?= $child_menu_item->url ?>">
                                        <?= $child_menu_item->title ?>
                                    </button>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </li>
            <?php
        }
    }
    ?>
</ul>