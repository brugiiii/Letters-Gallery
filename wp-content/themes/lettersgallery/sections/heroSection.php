<?php
$gallery = get_field("hero_gallery");
?>

<section class="hero">
    <div class="container">
        <?php
        if ($gallery || is_singular("product")) {
            ?>
            <div class="swiper hero-swiper">
                <ul class="swiper-wrapper">
                    <?php
                    if (!$gallery) {
                        ?>
                        <li class="swiper-slide hero-slide">
                            <?= wp_get_attachment_image(5, 'full', false, array('class' => '')); ?>
                        </li>
                        <?php
                    }

                    foreach ($gallery as $image_id) {
                        ?>
                        <li class="swiper-slide hero-slide">
                            <?= wp_get_attachment_image($image_id, 'full', false, array('class' => '')); ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
        }
        get_template_part('templates/breadcrumbs');
        ?>
    </div>
</section>