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
    $item_count_markup = ob_get_clean();

    ob_start();
    get_template_part("templates/basket/basket");
    $basket_products_markup = ob_get_clean();

    $cart_count = WC()->cart->get_cart_contents_count();

    $total_price = wc_price(WC()->cart->get_cart_contents_total());

    wp_send_json_success(array(
        "message" => $action === "add" ? "Product added to cart." : "Product removed from cart.",
        "cartCount" => $cart_count,
        "itemCount" => $item_count_markup,
        "basketMarkup" => $basket_products_markup,
        "totalPrice" => $total_price
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

    $product_price = wc_price($quantity * get_post_meta($product_id, "_regular_price", true));
    $total_products = WC()->cart->get_cart_contents_total();
    $shipping_total = WC()->cart->get_shipping_total();
    $cart_count = WC()->cart->get_cart_contents_count();

    $response = array(
        "productPrice" => $product_price,
        "productsPrice" => wc_price($total_products),
        "totalPrice" => wc_price($total_products + $shipping_total),
        "cartCount" => $cart_count
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