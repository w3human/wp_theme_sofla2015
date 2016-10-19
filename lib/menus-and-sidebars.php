<?php 
/**
 * register menus and sidebars
 */

/**
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus
 * Add an array item for each menu you want to register
 */
register_nav_menus(array(
	'header' => 'Header',
	'footer' => 'Footer',
));

add_action('wp_footer', function() {
	$phone_number=get_theme_option('phone-number');
	$fb_link=get_theme_option('facebook');
	$twit_link=get_theme_option('twitter');
	$gplus_link=get_theme_option('gplus');
	
	echo '<div id="mobile-nav-wrapper">';
		$close_button='<li><a class="text-center">Close Menu</a></li>';
	
		$extra_items=array();
			$soical_links=array();							
				if ($phone_number) {$social_links[]='<a href="tel: '. $phone_number .'" target="_blank"><span class="icon-phone-right"></span></a>';}
				if ($fb_link) {$social_links[]='<a href="'. $fb_link .'" target="_blank" class="social-fb"><span class="icon-facebook"></span></a>';}
				if ($twit_link) {$social_links[]='<a href="'. $twit_link .'" target="_blank" class="social-twitter"><span class="icon-twitter"></span></a>';}
				if ($gplus_link) {$social_links[]='<a href="'. $gplus_link .'" target="_blank" class="social-gplus"><span class="icon-gplus"></span></a>';}
				
			$extra_items[]='<li class="social-items">'. join(' ', $social_links) .'</li>';
		
		wp_nav_menu(array(
			'theme_location' => 'header',
			'menu_class' => 'nav nav-pills nav-stacked',
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'. join(' ', $extra_items) .'</ul>',
		));
	echo '</div>';
});

if (function_exists('register_sidebar')) {
	// Site Wide Ones
	register_sidebar(
		array(
			'name' => 'Sidebar (Main)',
			'description' => 'Main sidebar to be used.',
			'id' => 'sidebar-main',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => 'Footer Column #1',
			'description' => 'Footer Column #1',
			'id' => 'footer-col-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => 'Footer Column #2',
			'description' => 'Footer Column #2',
			'id' => 'footer-col-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	register_sidebar(
		array(
			'name' => 'Footer Column #3',
			'description' => 'Footer Column #3',
			'id' => 'footer-col-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	
	// Pages
	register_sidebar(
		array(
			'name' => 'Our Services',
			'description' => 'Services You Provide',
			'id' => 'our-services',
			'before_widget' => '<div id="%1$s" class="widget col-md-3 col-sm-6 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	
	
}



