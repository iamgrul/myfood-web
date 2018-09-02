<?php

include('partials/product-box.php');
include('partials/products-tabs.php');
include('partials/team-box.php');
include('partials/cards-slideshow.php');
include('partials/large-slideshow.php');
include('partials/single-slideshow.php');
include('partials/pioneer-card.php');
include('partials/seeds-slideshow.php');
include('partials/news-card.php');
include('partials/share-list.php');
include('partials/shop-variations.php');
include('partials/module-card.php');
include('partials/medias-slideshow.php');
include('partials/seo-footer.php');
include('partials/collapsible.php');
include('partials/instagram-posts.php');
include('partials/customizable-tabs.php');
include('partials/modules-slideshow.php');
include('admin/options.php');
include('admin/custom-redirect.php');
include('admin/newsletter-mailchimp.php');
include('admin/woocommerce-custom.php');


define('WEBSITE_VERSION', '1.3');
define('theme', get_template_directory_uri());
define('img', theme . '/assets/img/');
define('js', theme . '/assets/javascripts/');
define('css', theme . '/assets/stylesheets/');

define('SHOP_HOME_URL', 8852);

if(isset($_SERVER["HTTPS"])){
    define('CURRENT_URL',"https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
}else{
    define('CURRENT_URL',"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
}

function ax_enqueue_scripts(){
    wp_deregister_script('wp-embed');
    wp_deregister_script( 'jquery' );
    wp_dequeue_script( 'jquery' );

    wp_enqueue_style('styles', css.'app.min.css', array(), WEBSITE_VERSION, 'all and (min-width: 1260px)');
    wp_enqueue_style('styles-norem', css.'app.norem.css', array(), WEBSITE_VERSION, 'all and (max-width: 1260px)');

    wp_enqueue_script('jquery', js.'vendors.min.js', array(), WEBSITE_VERSION, true);
    wp_enqueue_script('app', js.'app.min.js', array(), WEBSITE_VERSION, true);
    wp_enqueue_script('gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD2X6kPzBfMY_oyHnCXeu7O-fMUhQlTYDk', array(), false, true);

    wp_localize_script('app', 'myfood', array (
            'url' => home_url (),
            'theme' => get_bloginfo ('template_url'),
            'img' => img,
            'ajaxurl' => admin_url('admin-ajax.php'),
            'host' => $_SERVER['HTTP_HOST']
        )
    );
}

add_action('wp_enqueue_scripts', 'ax_enqueue_scripts');


function acf_img_echo($img, $size ='', $class='') {

    if(!$img){
        return echo_img('misc/errorPicture.jpg');
    }

    if($size =='' && wp_is_mobile())
        $size = 'large';

    if($size == "") {
        $url = $img['url'];
        $width = $img['width'];
        $height = $img['height'];
    } else {
        $url = $img['sizes'][$size];
        $width = $img['sizes'][$size.'-width'];
        $height = $img['sizes'][$size.'-height'];
    }

    $alt = $img['alt'];

    echo '<img class="lzld '.$class.'" data-src-medium="'.$img['sizes']['medium_large'].'" data-src="'.$url.'"  src="'.img.'misc/pixel.gif" alt="'.$alt.'" width="'.$width.'" height="'.$height.'">';
}


function get_img($path, $echo=true){
    if($echo){
        echo img.$path;
    }else{
        return img.$path;
    }
}

function echo_img($path){
    echo "<img src='".img.$path."'/>";
}

function is_homepage(){
    $cur = $_SERVER['REQUEST_URI'];

    if($cur == '/') return true;
    else return false;
}

function get_img_field($field, $id, $class= ""){
    $img = get_field($field, $id);
    if($img){
        $url = $img['url'];
        return "<img class='". $class ."' src='$url'/>";
    }else{
        return '';
    }
}


add_filter('ysacf_exclude_fields', function(){
    return array();
});

function ax_sanitize_file_name ($filename){
    $info = pathinfo($filename);
    $name = sanitize_title($info['filename']);
    return $name . '.' . $info['extension'];
}
add_filter('sanitize_file_name', 'ax_sanitize_file_name');


/**
 * SECURITE
 */
add_theme_support('admin-bar', array('callback' => '__return_false'));
add_filter('show_admin_bar', '__return_false');
add_filter('login_errors', create_function('$a', "return null;"));
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGES_JS', true);

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * HIDE ADMIN MENU
 */
function remove_menu_pages() {
    remove_menu_page('edit.php');
    remove_menu_page('tools.php');
    remove_menu_page('themes.php');
}
//add_action( 'admin_menu', 'remove_menu_pages' );

/**
 * REMOVE COMMENT
 */
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if(post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');


// Close comments on the front-end
function df_disable_comments_status() {
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
    global $pagenow;
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url()); exit;
    }
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
}
add_action('init', 'df_disable_comments_admin_bar');

function add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );


add_filter( 'pre_get_posts', 'ordering_by_post_type');
function ordering_by_post_type( $query ) {
    if ($query->is_search) {
        return $wpdb->posts . '.post_type DESC, title DESC';
    }
}

function paypal_checkout_icon() {
	return '/wp-content/uploads/2018/05/paypal-cb-transparent.png'; 
}
add_filter( 'woocommerce_paypal_icon', 'paypal_checkout_icon' );


add_filter('body_class', 'append_language_class');
function append_language_class($classes){
  $classes[] = ICL_LANGUAGE_CODE;
  return $classes;
}