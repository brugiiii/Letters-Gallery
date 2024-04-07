<?php
$image_left_id = get_field("about_image_left");
$image_right_id = get_field("about_image_right");
$about_text = get_field('about_text');
$paragraphs = explode("</p>", $about_text);
?>

<section class="about">
    <div class="container">
        <h2 class="h2 mb-0 section-title fw-medium">
            <?= the_field('about_title'); ?>
        </h2>
        <div class="about-wrapper">
            <ul class="images">
                <li class="images__item">
                    <?= wp_get_attachment_image($image_left_id, 'full', false, array('class' => '')); ?>
                </li>
                <li class="images__item">
                    <?= wp_get_attachment_image($image_right_id, 'full', false, array('class' => '')); ?>
                </li>
            </ul>
            <div class="about-inner">
                <div class="about-text p1 letter-spacing">
                    <?php
                    if (!empty($paragraphs)) {
                        for ($i = 0; $i < min(count($paragraphs), 2); $i++) {
                            if (!empty(trim($paragraphs[$i]))) {
                                echo "{$paragraphs[$i]}</p>";
                            }
                        }
                        if (count($paragraphs) > 2) {
                            ?>
                            <div class="about-text__item">
                                <?php
                                for ($i = 2; $i < count($paragraphs); $i++) {
                                    if (!empty(trim($paragraphs[$i]))) {
                                        echo "{$paragraphs[$i]}</p>";
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <button class="about-button text-uppercase letter-spacing bg-transparent p-0 border-0 fw-medium text-decoration-underline">
                    <span class="more">
                        <?= translate_and_output('read_more'); ?>
                    </span>
                    <span class="less">
                        <?= translate_and_output('show_less'); ?>
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>