<?php 
	$count_shortcode_portfolio_items=0;
	
	function shortcode_portfolio_items($atts, $content = null) {
		global $count_shortcode_portfolio_items;
		
		$count_shortcode_portfolio_items++;
		
		extract(shortcode_atts( array(
			'number_of' => 3,
		), $atts ) );
	
		$portfolio_items=get_posts(array(
			'post_type' => 'portfolio',
			'posts_per_pages' => $number_of,
		));
		
		$count_items=0;
	
	
		ob_start(); ?>
			<div id="shortcode-portfolio-items-<?= $count_shortcode_portfolio_items ?>" class="shortcode-portfolio-items">
				<div class="row">
					<?php 
						foreach ($portfolio_items as $item) { 
							$count_items++;
							
							$wrapper_classes=array('col-portfolio-post', 'col-md-4 col-sm-6');
	
							if (count($portfolio_items) == $count_items && ! ($count_items % 2 == 0)) {
								$wrapper_classes[]='last-and-odd';
							} ?>

							<div class="<?= join(' ', $wrapper_classes) ?>">
								<?= a_portfolio_post($item) ?>
							</div><?php 
						} 
					?>
				</div>
			</div><?php
		return ob_get_clean();
	}
	
	add_shortcode('portfolio-items', 'shortcode_portfolio_items');
