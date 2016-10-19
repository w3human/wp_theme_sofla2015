<?php 
/**
 * Add all non-admin javascript and css scripts here
 */



/**
 * To link to a local script, put it in /js and use:
 * get_template_directory_uri() . '/js/your-script.js'
 */
function custom_js() {
	wp_register_script('jquery.core', get_template_directory_uri().'/assets/js/jquery.core.min.js');
	wp_register_script('jquery.sticky', get_template_directory_uri().'/assets/js/jquery.sticky.js');
	wp_register_script('jquery.sidr', get_template_directory_uri().'/assets/js/jquery.sidr.js');
	wp_register_script('modernizr', get_template_directory_uri().'/assets/js/modernizr.min.js');
	wp_register_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js');
	
	wp_register_script('main-theme', get_template_directory_uri().'/assets/js/main.js');
	
	
	wp_enqueue_script('jquery.core');
	wp_enqueue_script('jquery.sticky');
	wp_enqueue_script('jquery.sidr');
	wp_enqueue_script('modernizr');
	wp_enqueue_script('bootstrap-js');
	wp_enqueue_script('main-theme');
}

add_action( 'wp_enqueue_scripts', 'custom_js' );



/**
 * To link to a local script, put it in /js and use:
 * get_template_directory_uri() . '/css/your-css.css'
 */
function custom_css() {
	// add bootstrap styles from CDN
    wp_register_style('compiled-sass', get_template_directory_uri().'/assets/css/compiled-sass.css');
    wp_register_style('style-css', get_template_directory_uri() . '/style.css');
    
    
    wp_enqueue_style('compiled-sass');
    wp_enqueue_style('style-css');
}

add_action( 'wp_enqueue_scripts', 'custom_css' );


