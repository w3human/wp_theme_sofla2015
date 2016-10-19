<?php if (have_posts()): ?>
	<div class="list-of-posts">
		<?php while (have_posts()) :  ?>
			<?php 
				the_post();
				
				$featured_image=featured_image($post->ID, 'medium');
				
				$is_dfi="";
				
				if ($featured_image == '') {
					$is_dfi='is_dfi';
					$featured_image=wp_default_featured_image();
				}
			?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="col-md-4">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div class="featured-image <?= $is_dfi ?>" style="background-image: url('<?= $featured_image ?>');">
						
						</div></a>
					</div>
					
					<div class="col-md-8">
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<p class="date">Published On: <?php the_time('M j, Y'); ?> <?php the_time('g:i a'); ?></p>
						
						<p class="excerpt"><?php the_excerpt(); // Build your custom callback length in functions.php ?></p>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</div>
<?php else: ?>

	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'custom' ); ?></h2>
	</article>

<?php endif; ?>
