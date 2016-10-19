<?php 
/**
 * functions that add theme features via theme support
 * @link http://codex.wordpress.org/Theme_Features
 */

if (function_exists('add_theme_support'))
{
	// Add Menu Support
	add_theme_support('menus');

	// This feature allows the use of HTML5 markup for the comment forms, search forms and comment lists.
	// @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Add Thumbnail Theme Support
	add_theme_support('post-thumbnails');

	// set the default thumbnail size
	// (using a large size for mobile devices)
	set_post_thumbnail_size( 768, 768 );

	// add additional sizes based on bootstrap
	add_image_size('large', 992, '', true); // Large Thumbnail
	add_image_size('medium', 768, '', true); // Medium Thumbnail
	add_image_size('small', 320, '', true); // Small Thumbnail

	// if additional custom sizes are needed
	// add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');



	// Enables post and comment RSS feed links to head
	// add_theme_support('automatic-feed-links');

}
