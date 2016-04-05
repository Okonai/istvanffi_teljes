<?php

/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_menu_page( 'Istvánffy rendelés kezelés', 'Istvánffy rendelés kezelés', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** Step 3. */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	get_template_part ( 'admin/templates/index' );
}

// Register Custom Post Type
function panel_post_type() {

	$labels = array(
		'name'                  => 'Frontpage Panels',
		'singular_name'         => 'Frontpage Panel',
	);
	$args = array(
		'label'                 => 'Frontpage Panel',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'frontpage_panel', $args );
}
add_action( 'init', 'panel_post_type', 0 );




?>