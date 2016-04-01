<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li class="single-product-list-item">
    <figure>
        <?php woocommerce_template_loop_product_thumbnail() ?>
        <figcaption class="product-list-info">
            <header>
            <?php woocommerce_template_loop_product_title() ?>
            </header>
            
            <button class="hollow button show-for-large open-add-to-cart" data-toggle="list-add-to-cart-<?php echo $woocommerce_loop['loop'] ?>">Kosárba</button>
            <a class="hollow button show-for-large visit-product-page" href="<?php echo $product->get_permalink()?>">Tovább a termékre</a>
            
            <?php woocommerce_template_single_excerpt() ?>
            
            <button class="hollow button hide-for-large open-add-to-cart" data-toggle="list-add-to-cart-<?php echo $woocommerce_loop['loop'] ?>">Kosárba</button>
            <a class="hollow button hide-for-large visit-product-page" href="<?php echo $product->get_permalink()?>">Tovább a termékre</a>
            
            <div class="list-add-to-cart-wrapper" id="list-add-to-cart-<?php echo $woocommerce_loop['loop'] ?>" data-toggler=".open">
                <?php woocommerce_template_single_add_to_cart() ?>
            </div>            
        </figcaption>
    </figure>
</li>
