<?php

function translate_and_output($string_key, $group = "Main Page")
{
    global $strings_to_translate;

    if (function_exists("pll__")) {
        return pll__($strings_to_translate[$string_key], $group);
    } else {
        return $strings_to_translate[$string_key];
    }
}

$strings_to_translate = array(
    "artists" => "Artist",
    "subject_matter" => "Subject Matter",
    "prev" => "prev",
    "next" => "next",
    "no_pictures" => "No pictures",
    "no_pictures_text" => "Unfortunately, the item is not found, but we will do our best to rectify this.",
    "price" => "Price :",
    "add_to_cart" => "Add to cart",
    "delete" => "Delete",
    "checkout" => "Checkout",
    "copyright" => "Copyright &#169; 2023 Letters Gallery",
    "email" => "Email address",
    "accessories" => "Accessories You May Like",
    "all_accessories" => "All accessories",
    "item" => "Item",
    "summary" => "Summary :",
    "read_more" => "read more",
    "show_less" => "show less",
    "delivery" => "Delivery",
    "free" => "Free",
    "total" => "Total",
    "no_products" => "No Product",
    "empty_basket_text" => "Go find the products you like.",
    "oops" => "Ooops.......",
    "something_wrong" => "Something went wrong",
    "return_to_main" => "Return to the main page",
    "view_all_artists" => "view all artists",
    "show_less_artists" => "show less artists",
    "artwork_details" => "artwork details",
    "accessory_details" => "accessory details",
    "painting" => "Painting",
    "accessory" => "Accessory",
    "size" => "Size (Cm)"
);

if (function_exists("pll_register_string")) {
    foreach ($strings_to_translate as $string_key => $string_value) {
        pll_register_string($string_key, $string_value, "Main Page");
    }
}