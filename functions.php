<?php
// Loads jQuery from Google CDN and local scripts
function load_scripts() {
    wp_enqueue_script('jquery-script', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
    wp_enqueue_script('modernizr', get_bloginfo('template_url').'/library/js/modernizr.js', array('jquery'), false, true );
    wp_enqueue_script('viewportchecker', get_bloginfo('template_url').'/library/js/viewportchecker.js', array('jquery'), false, true );
    wp_enqueue_script('fitvids', get_bloginfo('template_url').'/library/js/fitvids.js', array('jquery'), false, true );
    wp_enqueue_script('slidebars', get_bloginfo('template_url').'/library/js/slidebars.js', array('jquery'), false, true );
    wp_enqueue_script('pace', get_bloginfo('template_url').'/library/js/pace.min.js', array('jquery'), false, true );
    wp_enqueue_script('cookie', get_bloginfo('template_url').'/library/js/cookie.js', array('jquery'), false, true );
    wp_enqueue_script('responsiveslides', get_bloginfo('template_url').'/library/js/responsiveslides.js', array('jquery'), false, true );
    wp_enqueue_script('slider-settings', get_bloginfo('template_url').'/library/js/slider-settings.js', array('jquery'), false, true );
    wp_enqueue_script('cookiebar', get_bloginfo('template_url').'/library/js/cookiebar.js', array('jquery'), false, true );
}
add_action('wp_enqueue_scripts', 'load_scripts');
// Load CSS
function load_styles() {
    if (!is_admin()) {
	wp_enqueue_style('styles', get_template_directory_uri() . '/style.css');
	}
}
add_action('get_header', 'load_styles');

include(TEMPLATEPATH.'/library/functions/custom-post-types.php');
include(TEMPLATEPATH.'/library/functions/pagination.php');

global $wp_rewrite; $wp_rewrite->flush_rules();

// Register menu locations
register_nav_menus( array(
    'header_menu' => 'Header menu',
    'footer_menu' => 'Footer menu',
));

// Add custom post types to the dashabord
add_action( 'dashboard_glance_items', 'cpad_at_glance_content_table_end' );
function cpad_at_glance_content_table_end() {
    $args = array(
        'public' => true,
        '_builtin' => false
    );
    $output = 'object';
    $operator = 'and';

    $post_types = get_post_types( $args, $output, $operator );
    foreach ( $post_types as $post_type ) {
        $num_posts = wp_count_posts( $post_type->name );
        $num = number_format_i18n( $num_posts->publish );
        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );
        if ( current_user_can( 'edit_posts' ) ) {
            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
            echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';
        }
    }
}

// Add custom style sheet for dashboard editor
function my_theme_add_editor_styles() {
    add_editor_style( '/library/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );

// Advanced Custom Fields options page
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

// Register the custom login stylesheet
function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/library/login/login.css" />';
}
add_action('login_head', 'custom_login');

// Change the login logo URL
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// Change the login logo title
function my_login_logo_url_title() {
    return get_option('blogname');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//
function add_title_as_category( $postid ) {
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
  $post = get_post($postid);
  if ( $post->post_type == 'clients') { // change 'post' to any cpt you want to target
    $term = get_term_by('slug', $post->post_name, 'category');
    if ( empty($term) ) {
      $add = wp_insert_term( $post->post_title, 'category', array('slug'=> $post->post_name) );
      if ( is_array($add) && isset($add['term_id']) ) {
        wp_set_object_terms($postid, $add['term_id'], 'category', true );
      }
    }
  }
}
add_action('save_post', 'add_title_as_category');

// Generates the customm-css file from the options page colour selections
function generate_options_css() {
    $ss_dir = get_stylesheet_directory();
    ob_start(); // Capture all output into buffer
    require($ss_dir . '/library/functions/custom-styles.php'); // Grab the custom-style.php file
    $css = ob_get_clean(); // Store output in a variable, then flush the buffer
    file_put_contents($ss_dir . '/library/css/custom-styles.css', $css, LOCK_EX); // Save it as a css file
}
add_action( 'acf/save_post', 'generate_options_css' ); //Parse the output and write the CSS file on post save

// Modify the admin footer text
function modify_footer_admin () {
  echo '<span id="footer-thankyou">WordPress development by <a href="http://www.allentullett.co.uk" target="_blank">Allen Tullett Design</a></span>';
}
add_filter('admin_footer_text', 'modify_footer_admin');

function filter_ptags_on_images($content)
{
    // do a regular expression replace...
    // find all p tags that have just
    // <p>maybe some white space<img all stuff up to /> then maybe whitespace </p>
    // replace it with just the image tag...
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}

// we want it to be run after the autop stuff... 10 is default.
add_filter('the_content', 'filter_ptags_on_images');
?>
