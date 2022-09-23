<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* WooCommerce: The Code Below Removes Checkout Fields */
add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_field' );
function remove_checkout_field( $fields ) {

unset($fields['billing']['billing_company']);

return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'reorder_checkout_fields' );
 
function reorder_checkout_fields( $fields ) {
   
    $fields['country']['priority'] = 100;
 
  return $fields;
}