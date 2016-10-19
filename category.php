<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<section class="col col-sm-9 col-main" role="main">
				<h1><?php _e( 'Categories for', 'custom' ); the_category(); ?></h1>
			
				<?php include(locate_template('templates/loop.php')); ?>
				<?php include(locate_template('templates/pagination.php')); ?>		
			</section>
			<?php get_sidebar(); ?>
		</div><!-- row -->
	</div>
<?php get_footer(); ?>
