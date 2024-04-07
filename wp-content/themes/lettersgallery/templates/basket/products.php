<?php
$cart = WC()->cart;
?>
<div class="basket-inner">
    <ul class="basket-products">
        <?php
        foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
            $product_id = $cart_item['product_id'];
            $post = get_post($product_id);

            setup_postdata($post);

            get_template_part('templates/basket/productMarkup', null, array("quantity" => $cart_item['quantity']));

            wp_reset_postdata();
        }
        ?>
    </ul>
</div>
