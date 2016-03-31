<?php get_header(); ?>
	<main class="row frontpage">
		<?php echo do_shortcode('[slick-slider sliderheight="600" dots="false"]'); ?>
		<blockquote>„ Az ízlésben vagy ízlelésben kulturált ember sohasem a mennyiségre, hanem a minőségre, az anyagban és elkészítésben való változatosságra helyezi a hangsúlyt”</blockquote>
		<div class="row" id="istvannfirol">
			<?php
				// WP_Query arguments
				// WP_Query arguments
				$args = array (
					'category_name'          => 'frontpage_panel',
					'nopaging'               => false,
					'posts_per_page'         => 8,
					'order'                  => 'ASC',
				);
				// The Query
				$panels = get_posts($args);
				$index = 0;
				foreach($panels as $panel) :
				$index++;x
				?>
				<div class="panel small-12 column <?php echo ( $index > 3 ) ? "medium-12 wide" : "medium-4" ?>">
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($panel->ID) ); ?>
					<img src="<?php echo $url ?>" />
					<span class="panel-heading">
						<?php echo $panel->post_title ?>
						<hr />
					</span>

					<span class="panel-text"><?php echo wpautop($panel->post_content) ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</main>
<?php get_footer(); ?>