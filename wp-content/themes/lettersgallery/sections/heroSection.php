<?php
$gallery = get_field("hero_gallery");
?>

<section class="hero">
    <div class="container">
        <?php
        get_template_part('templates/breadcrumbs');

        if ($gallery) {
            ?>
            <div class="swiper hero-swiper">
                <ul class="swiper-wrapper">
                    <?php
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

        ?>
    </div>
</section>