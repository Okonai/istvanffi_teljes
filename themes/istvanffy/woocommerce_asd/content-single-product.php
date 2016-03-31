<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>
<main class="row">
    <div id="product-single">
        <div class="product-image">
            <?php woocommerce_show_product_images();	?>
        </div>
        <div class="product-info">
            <?php woocommerce_template_single_title() ?>
            <?php woocommerce_template_single_excerpt() ?>
            <button class="hollow button" data-toggle="product-more-info">További információ</button>
        </div>
        <div class="product-order">
            <?php woocommerce_template_single_add_to_cart() ?>
        </div>

        <div class="product-more-info" id="product-more-info" data-toggler=".open">
            <?php woocommerce_output_product_data_tabs(); ?>
        </div>        
    </div>
    <div id="related-products">        
        <?php woocommerce_output_related_products(); ?>
    </div>
</main>
