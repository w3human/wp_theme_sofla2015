<?php 
/**
 * functions that clean up little bits of generated HTML
 */



// Remove wp_head() injected Recent Comment styles
function remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
add_action('widgets_init', 'remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()



// Remove the <div> surrounding the dynamic navigation to cleanup markup
function custom_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}
add_filter('wp_nav_menu_args', 'custom_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation



// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute



// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)


 
// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function customwp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}
add_action('init', 'customwp_pagination'); // Add our HTML5 Pagination 



// Remove 'text/css' from our enqueued stylesheet
function custom_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}
add_filter('style_loader_tag', 'custom_style_remove'); // Remove 'text/css' from enqueued stylesheet



// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails



// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// function custom_css_attributes_filter($var)
// {
//     return is_array($var) ? array() : '';
// }
// add_filter('nav_menu_css_class', 'custom_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)



// Custom View Article link to Post
function custom_blank_view_article($more)
{
    global $post;
    return '... <a class="read-more" href="' . get_permalink($post->ID) . '">' . __('read more', 'customblank') . '</a>';
}
add_filter('excerpt_more', 'custom_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts



// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments


