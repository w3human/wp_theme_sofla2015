<?php 
	// Shortcode Container	
	$count_shortocde_container=0;
	
	function shortcode_block_container($atts, $content = null) {
		global $count_shortcode_container;
		
		$count_shortcode_container++;
		
		extract(shortcode_atts( array(
			'background_color' => 'white', // array('white', 'blue', 'dark-gray' 'light-gray')
		), $atts ) );
	
		ob_start(); ?>
			<div id="shortcode-container-<?= $count_shortcode_container ?>" class="shortcode-container bg-color-<?= $background_color ?>">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<?= do_shortcode($content) ?>
						</div>
					</div>					
				</div>
			</div><?php
		return ob_get_clean();
	}
	
	add_shortcode('block-container', 'shortcode_block_container');
	
	// Shortcode Button
	$count_shortocde_button=0;
	
	function shortcode_button($atts, $content = null) {
		global $count_shortcode_button;
		
		$count_shortcode_button++;
		
		extract(shortcode_atts( array(
			'color' => '',
			'big' => '',
			'link' => '', 
		), $atts ) );
		
		$classes=array(
			($big == 'true')?'btn-big':'',
			($color == 'true')?'btn-'.$color:'',
		);
		
		ob_start(); ?>		
			<div id="shortcode-button-<?= $count_shortcode_button ?>" class="shortcode-button">
				<div class="btn <?= join(' ', $classes) ?> ">
					<?php if ($link && $link != '' ) { ?> <a href='<?= $link ?>'> <?php } ?>
					<?= $content ?>
					<?php if ($link && $link != '' ) { ?> </a> <?php } ?>
				</div>	
			</div><?php	
		return ob_get_clean();
	}
	
	add_shortcode('button', 'shortcode_button');
	
	
	

	
