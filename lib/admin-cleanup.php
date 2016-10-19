<?php 
/**
 * functions to clean up wp-admin, and elements only admins see
 */



// hide extras in top bar in admin
function cleanup_admin_top_bar() {
	global $wp_admin_bar;
	
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('updates');
	// $wp_admin_bar->remove_menu('new-content');
}

add_action( 'wp_before_admin_bar_render', 'cleanup_admin_top_bar' );

// hide help tab
function customcontext_remove_help($old_help, $screen_id, $screen)
{
	$screen->remove_help_tabs();
	return $old_help;
}
add_filter( 'contextual_help', 'customcontext_remove_help', 999, 3 );

// hide welcome panel
// http://wordpress.stackexchange.com/a/36404
function hide_welcome_panel() {
    $user_id = get_current_user_id();

    if ( 1 == get_user_meta( $user_id, 'show_welcome_panel', true ) )
        update_user_meta( $user_id, 'show_welcome_panel', 0 );
}

add_action( 'load-index.php', 'hide_welcome_panel' );

// clean up dashboard widgets
// @link http://codex.wordpress.org/Dashboard_Widgets_API#Advanced:_Removing_Dashboard_Widgets
function remove_dashboard_meta() {
	//~ remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
	//~ remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	//~ remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	//~ remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
}

//~ add_action( 'admin_init', 'remove_dashboard_meta' );

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

//add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar



