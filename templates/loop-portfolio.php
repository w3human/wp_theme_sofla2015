<?php if (have_posts()): ?> 
	<div class="row">
		<?php while (have_posts()) : the_post(); ?>
			<div class="col-portfolio-post col-md-4 col-sm-6">
				<?= a_portfolio_post($post); ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php else: ?>

	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'custom' ); ?></h2>
	</article>

<?php endif; ?>
