<?php
$cart = WC()->cart;
$unique_items_count = count($cart->get_cart());

echo $unique_items_count;