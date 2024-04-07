<?php
$page = isset($args['page']) ? $args['page'] : 1;
$query = isset($args['query']) ? $args['query'] : '';

$total_pages = $query->max_num_pages;
$pagination_range = 1;
?>

<div class="pagination d-flex justify-content-center letter-spacing">
    <button class="p4 border-0 d-flex align-items-center justify-content-center text-uppercase pagination__controllers"
            type="button" href="#" data-page="<?= $page - 1; ?>" <?= $page === 1 ? 'disabled' : ''; ?>>
        <?= translate_and_output('prev'); ?>
    </button>
    <div class="pagination__pages">
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == 1 || $i == $total_pages || ($i >= $page - $pagination_range && $i <= $page + $pagination_range)) {
                ?>
                <button class="p3 border-0 d-flex align-items-center justify-content-center pagination__button <?= $i === $page ? 'current' : ''; ?>"
                        type="button" data-page="<?= $i; ?>"><?php echo $i; ?></button>
                <?php
            } elseif ($i == $page - $pagination_range - 1 || $i == $page + $pagination_range + 1) {
                ?>
                <span class="p4 pagination__ellipsis ">...</span>
                <?php
            }
        }
        ?>
    </div>
    <button class="p4 border-0 d-flex align-items-center justify-content-center text-uppercase pagination__controllers"
            type="button" href="#"
            data-page="<?= $page + 1; ?>" <?= $page == $total_pages ? 'disabled' : ''; ?>>
        <?= translate_and_output('next'); ?>
    </button>
</div>