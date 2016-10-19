<?php 
	$count_shortocde_image_block=0;
	
	function shortcode_image_block($atts, $content = null) {
		global $count_shortcode_image_block;
		
		$count_shortcode_image_block++;
		
		extract(shortcode_atts( array(			
			'image' => '',
			'side_image' => '',
			'height' => 'auto',
			'padding' => '0px',
			'content_direction' => 'left', // right or left
			'paralax' => 'false',
		), $atts ) );
	
		ob_start(); ?>
			<div 
				id="shortcode-image-block-<?= $count_shortcode_block_image ?>" 
				class="shortcode-image-block <?= ($paralax == 'true')?'paralax-effect':'' ?>" 
				style="background-image: url(<?= $image ?>); height: <?= $height ?>; padding-top: <?= $padding ?>; padding-bottom: <?= $padding ?>;" 
				data-content-direction="<?= $content_direction ?>"
			>
				<div class="container">
					<div class="row">
						<?php if ( ! ($side_image == '') ) : ?>
							<div class="col-sm-5 col-sm-push-7">
								<img src="<?= $side_image ?>">
							</div>
							
							<div class="col-sm-7 col-sm-pull-5">
								<?= do_shortcode($content); ?>
							</div>
						<?php else: ?>
							<div class="col-xs-12">
								<?= do_shortcode($content); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				
				
			</div><?php
		return ob_get_clean();
	}
	
	add_shortcode('image-block', 'shortcode_image_block');
