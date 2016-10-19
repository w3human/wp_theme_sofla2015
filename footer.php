
			</div><!-- wrapper-content -->

			<footer class="layout">
				<div id="footer-widget-areas">
					<div class="container">
						<div class="row" >
							<div class="col-sm-5">
								<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-col-1')) ?>
							</div>
							
							<div class="col-sm-7">
								<div class="row">
									<div class="col-md-6">
										<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-col-2')) ?>
									</div>
									
									<div class="col-md-6">
										<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-col-3')) ?>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
					
				<div id="footer-bottom">
					<div class="container">
						<div class="row">
							<div class="col-xs-12" id="footer-bottom-nav">
								<?php wp_nav_menu(array(
									'theme_location' => 'footer',
									'menu_class' => 'nav',
									'depth' => 1,
								)); ?>
							</div>
							
							<div id="site-copyright" class="col-xs-12"><?= get_theme_option('copyright') ?></div>
						</div>
					</div>					
				</div>
			</footer>
		</div><!-- wrapper-all -->

		<?php wp_footer(); ?>
	</body>
</html>
