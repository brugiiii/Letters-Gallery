<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#3F352C"/>

    <?php
    $title = get_field("meta_title");
    $description = get_field("meta_description");
    $keywords = get_field("meta_keywords");
    $image = get_field("meta_image");

    if ($title) {
        ?>
        <meta name="title" content="<?= $title; ?>">
        <meta property="og:title" content="<?= $title; ?>">
        <meta name="twitter:title" content="<?= $title; ?>">
        <?php
    }
    if ($description) {
        ?>
        <meta name="description" content="<?= $description; ?>">
        <meta property="og:description" content="<?= $description; ?>">
        <meta name="twitter:description" content="<?= $description; ?>">
        <?php
    }
    if ($keywords) {
        ?>
        <meta name="keywords" content="<?= $keywords; ?>">
        <?php
    }
    if ($image) {
        ?>
        <meta property="og:image" content="<?= $image; ?>">
        <?php
    }
    wp_head();
    ?>

    <title><?php wp_title(); ?></title>

</head>

<body style="visibility: hidden">

<?php if (is_404()) return ?>
<div class="wrapper">
    <header class="header">

        <div class="header-wrapper">
            <div class="wrapper-container container d-flex justify-content-between align-items-center">
                <?=
                get_template_part('templates/logo');
                get_template_part('templates/contacts', null, array("skip_iteration_id" => 2));
                get_template_part('templates/burgerButton');
                ?>
            </div>
        </div>

        <div class="header-container container">
            <div class="nav-wrapper d-flex align-items-center justify-content-between">
                <nav class="main-nav">
                    <?= get_template_part('templates/navigation', null, array('location' => 'menu-header')); ?>
                    <span class="nav-line"></span>
                </nav>
                <div class="toolbar d-flex align-items-center">
                    <?=
                    get_template_part('templates/languageSwitcher');
                    get_template_part('templates/cartButton');
                    ?>
                </div>
            </div>
        </div>

    </header>

