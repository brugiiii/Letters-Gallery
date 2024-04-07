<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#3F352C" />

    <?php wp_head(); ?>

    <title><?php wp_title(); ?></title>

</head>

<body style="visibility: hidden">

<?php
$current_lang = pll_current_language();
$basket_id = pll_get_post(124, $current_lang);
$cart_count = WC()->cart->get_cart_contents_count();
?>

<?php if (is_404()) return ?>
<div class="wrapper">
    <header class="header">

        <div class="header-wrapper letter-spacing">
            <div class="wrapper-container container d-flex justify-content-between align-items-center">
                <?=
                get_template_part('templates/logo');
                get_template_part('templates/contacts', null, array("skip_iteration_id" => 2));
                ?>

                <button type="button" class="burger bg-transparent border-0 px-0">
                    <span class="burger__wrapper">
                        <span class="burger__item"></span>
                        <span class="burger__item"></span>
                        <span class="burger__item"></span>
                    </span>
                </button>
            </div>
        </div>

        <div class="header-container container">
            <div class="nav-wrapper d-flex align-items-center justify-content-between">
                <nav class="main-nav">
                    <?= get_template_part('templates/navigation', null, array('location' => 'menu-header')); ?>
                    <span class="nav-line"></span>
                </nav>
                <div class="tools-wrapper">
                    <?= get_template_part('templates/languageSwitcher'); ?>
                    <a href="<?= get_permalink($basket_id); ?>"
                       class="cart-button d-flex align-items-center gap-2 <?= $cart_count === 0 ? " hidden" : ""; ?>"
                       type="button">
                        <span class="card-button__price fw-medium">
                            <?= wc_price(WC()->cart->get_cart_contents_total()); ?>
                        </span>
                        <div class="cart-button__wrapper position-relative">
                            <svg class="card-button__icon" width="28" height="28">
                                <use href="<?php get_image('sprite.svg#basket'); ?>"></use>
                            </svg>
                            <span class="p8 letter-spacing position-absolute top-0 end-0 text-white rounded-circle text-center cart-count">
                            <?= $cart_count; ?>
                        </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </header>
