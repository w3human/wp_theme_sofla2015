<?php 
	$featured_image=featured_image($post->ID, 'full');
	

	get_header(); 

?>
	<?php if ($featured_image != '') { ?>
		<div class="container">
			<div class="row">
				<div class="col-xs-12"><img class="page-featured-image" src="<?= $featured_image ?>" /></div>
			</div>
		</div>
	<?php } ?>

	<div class="container">
		<div class="row">
			<section class="col col-sm-9 col-main" role="main">
				<?php if (get_post_meta(get_the_ID(), 'remove_page_title', true) != 'true') : ?>
					<h1 class="page-title"><?php the_title(); ?></h1>
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

			<?php get_sidebar(); ?>
		</div><!-- row -->
	</div>
	
<?php get_footer(); ?>
