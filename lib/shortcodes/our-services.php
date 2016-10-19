<?php
	$count_shortocde_our_services=0;
	
	function shortcode_our_services($atts, $content = null) {
		global $count_shortcode_our_services;
		
		$count_shortcode_our_services++;
		
		ob_start(); ?>
			<div id="shortcode-our-services-<?= $count_shortcode_our_services ?>" class="shortcode-our-services">
				<div class="row">
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('our-services')) ?>
				</div>
			</div><?php
		return ob_get_clean();
	}
	
	add_shortcode('our-service', 'shortcode_our_services');
