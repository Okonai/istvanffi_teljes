<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<main class="row">
    <?php if ( ! WC()->cart->is_empty() ) : ?>   
    <aside class="sidebar">
        <?php woocommerce_mini_cart() ?>
    </aside>
    <?php endif; ?>
    <div id="product-list">
        <?php wc_print_notices() ?>
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
        <?php woocommerce_breadcrumb(); ?>
        <?php if ( have_posts() ) : ?>
            
            <?php woocommerce_catalog_ordering(); ?>
        
            <ul class="tabs products" data-tabs id="example-tabs">
                <?php 
                    $panel_id=0;
                    $panels = "";
                    while ( have_posts() ) : the_post(); 
                    $panel_id++;
                ?>

                    <li class="tabs-title single-product-list-item">
                        <a href="#panel<?php echo $panel_id ?>"> 
                            <?php wc_get_template_part( 'content-product-loop', 'main'); ?>
                        </a>
                    </li>   


                    <?php ob_start(); ?>
                        <div class="tabs-panel" id="panel<?php echo $panel_id ?>">
                            <?php wc_get_template_part( 'content-product-loop', 'panel'); ?>
                        </div>                
                    <?php 
                        $panels = $panels . ob_get_contents();
                        ob_end_clean();
                echo $post_length;
                    ?>
                    <?php if($panel_id % 4 == 0 ): ?>
                        <div class="tabs-content" data-tabs-content="example-tabs">
                            <?php echo $panels; $panels = ""; ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile; // end of the loop. ?>
                <div class="tabs-content" data-tabs-content="example-tabs">
                    <?php echo $panels; $panels = ""; ?>
                </div>
            </ul>
			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>
    </div>
</main>

<?php get_footer( 'shop' ); ?>
