<?php

include_once('functions/woocommerce.php');
include_once('functions/src_includes.php');
include_once('functions/istvanffi_functions.php');

// Register Sidebars
function shop_sidebar() {

	$args = array(
		'id'            => 'shop_sidebar',
		'name'          => __( 'Shop Sidebar', 'text_domain' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'shop_sidebar' );