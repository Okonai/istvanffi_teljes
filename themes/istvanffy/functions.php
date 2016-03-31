<?php

include_once('functions/woocommerce.php');
include_once('functions/src_includes.php');
include_once('functions/istvanffi_functions.php');

// Add Variation Settings
add_action( 'woocommerce_product_after_variable_attributes', 'variation_settings_fields', 10, 3 );
// Save Variation Settings
add_action( 'woocommerce_save_product_variation', 'save_variation_settings_fields', 10, 2 );

function variation_settings_fields( $loop, $variation_data, $variation ) {
	// Select
	woocommerce_wp_select( 
	array( 
		'id'          => '_select[' . $variation->ID . ']', 
		'label'       => __( 'My Select Field', 'woocommerce' ), 
		'description' => __( 'Choose a value.', 'woocommerce' ),
		'value'       => get_post_meta( $variation->ID, '_select', true ),
		'options' => array(
			'one'   => __( 'Option 1', 'woocommerce' ),
			'two'   => __( 'Option 2', 'woocommerce' ),
			'three' => __( 'Option 3', 'woocommerce' )
			)
		)
	);
	// Checkbox
	woocommerce_wp_checkbox( 
	array( 
		'id'            => '_checkbox[' . $variation->ID . ']', 
		'label'         => __('My Checkbox Field', 'woocommerce' ), 
		'description'   => __( 'Check me!', 'woocommerce' ),
		'value'         => get_post_meta( $variation->ID, '_checkbox', true ), 
		)
	);
	// Hidden field
	woocommerce_wp_hidden_input(
	array( 
		'id'    => '_hidden_field[' . $variation->ID . ']', 
		'value' => 'hidden_value'
		)
	);
}
/**
 * Save new fields for variations
 *
*/
function save_variation_settings_fields( $post_id ) {
	// Text Field
	$text_field = $_POST['_text_field'][ $post_id ];
	if( ! empty( $text_field ) ) {
		update_post_meta( $post_id, '_text_field', esc_attr( $text_field ) );
	}
	
	// Number Field
	$number_field = $_POST['_number_field'][ $post_id ];
	if( ! empty( $number_field ) ) {
		update_post_meta( $post_id, '_number_field', esc_attr( $number_field ) );
	}
	// Textarea
	$textarea = $_POST['_textarea'][ $post_id ];
	if( ! empty( $textarea ) ) {
		update_post_meta( $post_id, '_textarea', esc_attr( $textarea ) );
	}
	
	// Select
	$select = $_POST['_select'][ $post_id ];
	if( ! empty( $select ) ) {
		update_post_meta( $post_id, '_select', esc_attr( $select ) );
	}
	
	// Checkbox
	$checkbox = isset( $_POST['_checkbox'][ $post_id ] ) ? 'yes' : 'no';
	update_post_meta( $post_id, '_checkbox', $checkbox );
	
	// Hidden field
	$hidden = $_POST['_hidden_field'][ $post_id ];
	if( ! empty( $hidden ) ) {
		update_post_meta( $post_id, '_hidden_field', esc_attr( $hidden ) );
	}
}

add_filter( 'woocommerce_form_field_multiselect', 'custom_multiselect_handler', 10, 4 );

function custom_multiselect_handler( $field, $key, $args, $value ) {

    $options = '';

    if ( ! empty( $args['options'] ) ) {
        foreach ( $args['options'] as $option_key => $option_text ) {
            $options .= '<option value="' . $option_key . '" '. selected( $value, $option_key, false ) . '>' . $option_text .'</option>';
        }

        $field = '<p class="form-row ' . implode( ' ', $args['class'] ) .'" id="' . $key . '_field">
            <label for="' . $key . '" class="' . implode( ' ', $args['label_class'] ) .'">' . $args['label']. $required . '</label>
            <select name="' . $key . '" id="' . $key . '" class="select" multiple="multiple">
                ' . $options . '
            </select>
        </p>' . $after;
    }

    return $field;
}

add_action('woocommerce_after_order_notes', 'my_custom_checkout_field');

function my_custom_checkout_field( $checkout ) {

    echo '<div id="my_custom_checkout_field"><h3>'.__('My Field').'</h3>';

    woocommerce_form_field( 'my_field_name', array(
        'type'          => 'multiselect',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Fill in this field'),
        'placeholder'   => __('Enter something'),
        'options'       => array(
            'Buick' => __('Buick', 'woocommerce' ),
            'Ford' => __('Ford', 'woocommerce' )
        )
        ), $checkout->get_value( 'my_field_name' ));

    echo '</div>';

}