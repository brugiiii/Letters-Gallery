<?php
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');
add_action('after_setup_theme', 'theme_setup');
function enqueue_scripts_and_styles()
{
    // DEREGISTER JQUERY / REGISTER JQUERY / REGISTER JQUERY MIGRATE / ENQUEUE JQUERY
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//code.jquery.com/jquery-1.11.0.min.js');
    wp_register_script('jquery-migrate', '//code.jquery.com/jquery-migrate-1.2.1.min.js');
    wp_enqueue_script('jquery');

    // MAIN SCRIPTS AND STYLES
    if (!is_404()) {
        wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/css/main.bundle.css'); // R
        wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/js/main.bundle.js', array('jquery'), null, true);
    }

    if (is_page_template('pages/home.php')) {
        wp_enqueue_script('home-js', get_template_directory_uri() . '/dist/js/home.bundle.js', array('jquery'), null, true);
        wp_enqueue_style('home-style', get_template_directory_uri() . '/dist/css/home.bundle.css');
    }

    if (is_page_template('pages/accessories.php')) {
        wp_enqueue_script('accessories-js', get_template_directory_uri() . '/dist/js/accessories.bundle.js', array('jquery'), null, true);
        wp_enqueue_style('accessories-style', get_template_directory_uri() . '/dist/css/accessories.bundle.css');
    }

    if (is_page_template('pages/basket.php')) {
        wp_enqueue_script('basket-js', get_template_directory_uri() . '/dist/js/basket.bundle.js', array('jquery'), null, true);
        wp_enqueue_style('basket-style', get_template_directory_uri() . '/dist/css/basket.bundle.css');
    }

    if (is_page_template('pages/legal.php')) {
        wp_enqueue_script('legal-js', get_template_directory_uri() . '/dist/js/legal.bundle.js', array('jquery'), null, true);
        wp_enqueue_style('legal-style', get_template_directory_uri() . '/dist/css/legal.bundle.css');
    }

    if (is_singular('product')) {
        wp_enqueue_script('product-js', get_template_directory_uri() . '/dist/js/product.bundle.js', array('jquery'), null, true);
        wp_enqueue_style('product-style', get_template_directory_uri() . '/dist/css/product.bundle.css');
    }

    if (is_404()) {
        wp_enqueue_script('404-js', get_template_directory_uri() . '/dist/js/404.bundle.js', array('jquery'), null, true);
        wp_enqueue_style('404-style', get_template_directory_uri() . '/dist/css/404.bundle.css');
    }

    // LOCALIZE SCRIPT
    $settings = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => pll_home_url()
    );
    wp_localize_script('main-js', 'settings', $settings);
}

function theme_setup()
{
    show_admin_bar(false);
    register_nav_menu('menu-header', 'Main menu');

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}