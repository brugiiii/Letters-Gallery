<?php
$products = $args["products"] ?? null;
$param = $args["param"] ?? null;

$terms = get_terms(array(
    "taxonomy" => "product_" . $param,
));

if (!empty($terms) && !is_wp_error($terms)) {
    ?>
    <h4 class="h5 fw-semibold gallery__title mb-0">
        <?= translate_and_output($param); ?>
    </h4>
    <ul class="<?= $param . "-list nav-list"; ?>">
        <?php
        foreach ($terms as $term) {
            ?>
            <li class="<?= $param . "-list__item nav-list__item"; ?>">
                <button type="button"
                        class="<?= "nav-list__button p3 border-0 bg-transparent px-0"; ?>"
                        data-tax-slug="product_<?= $param; ?>"
                        data-tax-id="<?= $term->term_id; ?>"
                ><?= $term->name; ?></button>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}
?>
