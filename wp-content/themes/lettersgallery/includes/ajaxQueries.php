<?php
add_action("wp_ajax_fetch_products", "fetch_products");
add_action("wp_ajax_nopriv_fetch_products", "fetch_products");
add_action("wp_ajax_manipulate_cart", "manipulate_cart");
add_action("wp_ajax_nopriv_manipulate_cart", "manipulate_cart");
add_action("wp_ajax_update_product_quantity", "update_product_quantity");
add_action("wp_ajax_nopriv_update_product_quantity", "update_product_quantity");
add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');
function fetch_products()
{
    get_template_part("templates/home/products");
}

function manipulate_cart()
{
    $product_id = isset($_POST["productId"]) ? intval($_POST["productId"]) : 0;
    $action = $_POST["cartAction"] ?? "add";

    if (!$product_id) {
        wp_send_json_error("Error: Product ID is missing.");
    }

    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error("Error: Product not found.");
    }

    if ($action === "add") {
        WC()->cart->add_to_cart($product_id);
    } else {
        $product_cart_id = WC()->cart->generate_cart_id($product_id);
        $cart_item_key = WC()->cart->find_product_in_cart($product_cart_id);

        if ($cart_item_key) {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    ob_start();
    get_template_part("templates/basket/itemCount");
    $cart_count = ob_get_clean();

    ob_start();
    get_template_part("templates/basket/basketMarkup");
    $basket_markup = ob_get_clean();

    ob_start();
    get_template_part("templates/cartButton");
    $cart_button_markup = ob_get_clean();

    wp_send_json_success(array(
        "message" => $action === "add" ? "Product added to cart." : "Product removed from cart.",
        "cartCount" => $cart_count,
        "basketMarkup" => $basket_markup,
        "cartButtonMarkup" => $cart_button_markup
    ));

    wp_die();
}

function update_product_quantity()
{
    $product_id = isset($_POST["productId"]) ? intval($_POST["productId"]) : 0;
    $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 0;

    if (!$product_id) {
        wp_send_json_error("Error: Product ID is missing.");
    }

    $product_cart_id = WC()->cart->generate_cart_id($product_id);
    $cart_item_key = WC()->cart->find_product_in_cart($product_cart_id);

    if ($cart_item_key) {
        WC()->cart->set_quantity($cart_item_key, $quantity);
    }

    ob_start();
    get_template_part("templates/cartButton");
    $cart_button_markup = ob_get_clean();

    ob_start();
    get_template_part("templates/basket/summary", null, array("link_visible" => true));
    $summary_markup = ob_get_clean();

    $product_price = wc_price($quantity * get_post_meta($product_id, "_regular_price", true));

    $response = array(
        "productPrice" => $product_price,
        "cartButtonMarkup" => $cart_button_markup,
        "summaryMarkup" => $summary_markup
    );

    wp_send_json_success($response);

    wp_die();
}

function send_mail()
{
    if ($_SERVER["REQUEST_METHOD"] != "POST") return wp_send_json_error("The email can only be sent via a POST request.");

    $email = sanitize_text_field($_POST['email']);

    $response = send_email_message($email);

    if ($response) {
        wp_send_json_success("Email sent successfully");
    } else {
        wp_send_json_error("Email sending failed");
    }

    wp_die();
}