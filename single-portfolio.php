<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<section class="col col-sm-9 col-main" role="main">
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1><?php the_title(); ?></h1>
										
						<?php if ( has_post_thumbnail()) : ?>
							<img src="<?= featured_image($post->ID, 'full') ?>" id="portfolio-featured-image">
						<?php endif; ?>
								
						<?php the_content();  ?>
						
						<p><?php the_terms( $post->ID, 'portfolio_tags', 'Tags: ', ', ' ); ?></p>
						
						<p>Website: <a href="<?= get_post_meta($post->ID, 'website_url', true) ?>"><?= get_post_meta($post->ID, 'website_url', true) ?></a></p>				
					</article>
				<?php endwhile; ?>
							
				<?php else: ?>
					
					<article>
						<h1><?php _e( 'Sorry, nothing to display.', 'custom' ); ?></h1>
					</article>
							
				<?php endif; ?>
			</section>
		
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
