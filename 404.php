<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<section class="col col-sm-9 col-main" role="main">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php _e( 'Page not found', 'custom' ); ?></h1>
					<h2>
						<a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'custom' ); ?></a>
					</h2>
				</article>		
			</section>

			<?php get_sidebar(); ?>

		</div><!-- row -->
	</div>
<?php get_footer(); ?>
