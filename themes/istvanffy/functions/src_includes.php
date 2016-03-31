<?php

/* Scripts */
function wptuts_scripts_basic()
{

    wp_deregister_script('jquery');
	
    wp_register_script( 'jquery', get_template_directory_uri() . '/prototype/bower_components/jquery/dist/jquery.js', [] , 1, true  );
    wp_register_script( 'foundation', get_template_directory_uri() . '/prototype/bower_components/foundation-sites/dist/foundation.js', [] , 1, true );
	wp_register_script( 'app', get_template_directory_uri() . '/prototype/js/app.js', [] , 1, true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'foundation' );
    wp_enqueue_script( 'app' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic' );
/* Scripts */

/* Style */
function wptuts_styles_with_the_lot()
{
	//wp_deregister_style('open-sans');
    wp_deregister_style('woocommerce-layout');
    wp_deregister_style('woocommerce-smallscreen');
    wp_deregister_style('woocommerce-general');
   
    wp_register_style( 'base', get_template_directory_uri() . '/prototype/css/app.css', array(), '20120208', 'all' );
 
    wp_enqueue_style( 'base' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_styles_with_the_lot' );
/* Style */