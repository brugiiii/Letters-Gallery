<?php
$cart = WC()->cart;
$unique_items_count = count($cart->get_cart());

echo $unique_items_count . " " . ($unique_items_count > 1 ? translate_and_output('positions') : translate_and_output('position'));