<?php
$data = array(
    array("order" => "DESC", "title" => translate_and_output("high_to_lowest")),
    array("order" => "ASC", "title" => translate_and_output("lowest_to_highest"))
);
?>

<div class="gallery-nav">
    <h4 class="p3 fw-semibold gallery__title mb-0">
        <?= htmlspecialchars(translate_and_output("price")); ?>
    </h4>
    <ul class="nav-list">
        <?php foreach ($data as $item): ?>
            <li class="price-list__item nav-list__item">
                <button type="button"
                        class="nav-list__button p3 border-0 bg-transparent px-0"
                        data-tax-slug="price-order"
                        data-order="<?= htmlspecialchars($item["order"]); ?>"
                >
                    <?= htmlspecialchars($item["title"]); ?>
                </button>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
