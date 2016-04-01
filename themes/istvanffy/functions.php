<?php

include_once('functions/woocommerce.php');
include_once('functions/src_includes.php');
include_once('functions/istvanffi_functions.php');

// Add Variation Settings
add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
// Save Variation Settings
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );


// Register Sidebars
function shop_sidebar() {

	$args = array(
		'id'            => 'shop_sidebar',
		'name'          => __( 'Shop Sidebar', 'text_domain' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'shop_sidebar' );