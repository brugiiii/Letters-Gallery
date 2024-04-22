<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#3F352C"/>

    <?php wp_head(); ?>

    <title><?php wp_title(); ?></title>

</head>

<body style="visibility: hidden">

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
                <?= get_template_part('templates/languageSwitcher'); ?>

                <?= get_template_part('templates/cartButton'); ?>
            </div>
        </div>

    </header>

