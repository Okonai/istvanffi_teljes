<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="off-canvas-wrapper">
			<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
				<div class="off-canvas position-left reveal-for-medium" id="offCanvas" data-off-canvas>
					<a href="/" class="logo"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" /></a>
					<ul class="vertical menu">
						<li>
							<a href="http://foundation.zurb.com/learn/about.html"><span>Kínálatunk</span></a>
							<ul class="submenu menu vertical image" data-submenu="">
								<?php
									//global $post;
									$args = array(
										'number'     => $number,
										'orderby'    => $orderby,
										'order'      => $order,
										'hide_empty' => $hide_empty,
										'include'    => $ids
									);

									$product_categories = get_terms( 'product_cat', $args );

									foreach ($product_categories as $term) : ?>
										<li class="small-6 medium-12 float-left">
											<a href="<?php echo get_term_link( $term->term_id, 'product_cat' ); ?>">
												<?php
												$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
												$image = wp_get_attachment_url( $thumbnail_id );
												if ( $image ) {
													echo '<img src="' . $image . '" alt="" />';
												}
												?>
												<span class="category-name"><?php echo $term->name ?></span>
											</a>
										</li>
									<?php endforeach; ?>
							</ul>
						</li>
					</ul>
				</div>
				<div class="off-canvas-content" data-off-canvas-content>
					<header class="title-bar hide-for-medium">
						<div class="title-bar-left">
							<button class="menu-icon" type="button" data-open="offCanvas"></button>
						</div>
					</header>
