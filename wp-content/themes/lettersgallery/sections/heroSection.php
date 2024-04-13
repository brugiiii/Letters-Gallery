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
                        $image_url = wp_get_attachment_image_src(5, 'full');
                        ?>
                        <li class="swiper-slide hero-slide zoom-js" style="background-image: url(<?= $image_url[0]; ?>)">
                            <?= wp_get_attachment_image(5, 'full', false, array('class' => '')); ?>
                        </li>
                        <?php
                    }

                    foreach ($gallery as $image) {
                        ?>
                        <li class="swiper-slide hero-slide zoom-js"
                            style="background-image: url(<?= $image["url"]; ?>)">
                            <?= wp_get_attachment_image($image["id"], 'full', false, array('class' => '')); ?>
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