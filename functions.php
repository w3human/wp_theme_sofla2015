<?php

	// For testing - Uncomment if you get a blank page. This code will often show errors.
	error_reporting(E_ALL ^ E_NOTICE  ^ E_WARNING);
	ini_set('display_errors', 1);
	
	/**
	 * theme customization
	 */
	include __DIR__ . '/lib/theme-support.php';
	include __DIR__ . '/lib/remove-actions-and-filters.php';
	include __DIR__ . '/lib/js-and-css-scripts.php';
	include __DIR__ . '/lib/menus-and-sidebars.php';
	include __DIR__ . '/lib/post-types.php';


	/**
	 * functions to clean up wp-admin, and html generated by wordpress
	 */
	include __DIR__ . '/lib/admin-cleanup.php';
	include __DIR__ . '/lib/html-cleanup.php';
	
	include __DIR__ . '/theme-options.php';
		$theme_options=get_option("the_theme_options");
		
		function get_theme_option($a) {
			global $theme_options;
							
			if (is_array($a)) {
				$carryOver=$theme_options;
				
				foreach ($a as $b) {
					$carryOver=$carryOver[$b];
				}
				
				return $carryOver;
			}
			else {
				return $theme_options[$a];
			}
		}
		
	$wp_imageSizes=array("thumbnail", "medium", "large", "full");
	
	$wp_dfi_theme_url=get_template_directory_uri().'/assets/img/default_blog_post_featured_image.jpg';
	
	function wp_default_featured_image() {
		global $wp_dfi_theme_url;
		
		return $wp_dfi_theme_url;
	}
	
	function featured_image($postID, $size) {
		global $wp_imageSizes, $wp_dfi_theme_url;
		
		$wp_featuredImage=wp_get_attachment_image_src(get_post_thumbnail_id($postID), ((in_array($size, $wp_imageSizes))?$size:"full")); 
		$featuredImage=$wp_featuredImage[0];
		
		if (! ($featuredImage == '')) {
			return $featuredImage;
		}
	}
	
	function a_portfolio_post($post) {
		$featured_image=featured_image($post->ID, 'medium');
		
		ob_start(); ?>
			<div class="a-portfolio-post" id="post-id-<?php the_ID(); ?>">
				<a href="<?= get_permalink($post->ID) ?>">
					<div class="featured-image" style="background-image: url(<?= $featured_image ?>)">
						<div class="overlay">
							<span class="icon-plus"></span>
							<h3><?= $post->post_title; ?></h3>
						</div>
					</div>
				</a>
			</div><?php 		
		return ob_get_clean();
	}

	include __DIR__.'/lib/disable-page-title-metabox.php';
	include __DIR__.'/lib/shortcodes.php';
	include __DIR__.'/lib/widgets.php';
