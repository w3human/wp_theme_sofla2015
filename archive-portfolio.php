<?php 
	$portfolio_description=get_theme_option('portfolio_description');

	get_header(); 
?>
	<div class="container">
		<div class="row">
			<section class="col col-xs-12 col-main" role="main">
				<h1>Portfolio</h1>
				
				<?php if (! ($portfolio_description == '')) { ?>
					<p class="open-sans-semi-bold"><?= get_theme_option('portfolio_description') ?></p>
				<?php } ?>
				
				<?php include(locate_template('templates/loop-portfolio.php')); ?>
				<?php include(locate_template('templates/pagination.php')); ?>
			</section>

			<?php // get_sidebar(); ?>

		</div><!-- row -->
	</div>	
<?php get_footer(); ?>
