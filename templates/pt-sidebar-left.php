<?php
/*
	Template Name: Sidebar Left
*/

get_header(); ?>
	<div class="container">
		
		<div class="row">
			<?php get_sidebar(); ?>
			
			<section class="col col-sm-9 col-main" role="main">
				<?php if (get_post_meta(get_the_ID(), 'remove_page_title', true) != 'true') : ?>
					<h1><?php the_title(); ?></h1>
				<?php endif; ?>	
				
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php the_content(); ?>
						
						<?php // comments_template( '', true ); // Remove if you don't want comments ?>
						
						<?php // edit_post_link(); ?>
						
					</article>
				<?php endwhile; ?>
						
				<?php else: ?>	
					<article>
						<h2><?php _e( 'Sorry, nothing to display.', 'custom' ); ?></h2>
					</article>
				<?php endif; ?>
						
			</section>

			
		</div><!-- row -->
	</div>

<?php get_footer(); ?>
