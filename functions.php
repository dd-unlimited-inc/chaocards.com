<?php
/**
 * Theme functions and definitions 
 * @package Creative Pop Theme
 * @since Creative Pop Theme 0.1
 */

/**
 * INITIAL SETTING
 */

/* woocommerce theme support */
add_theme_support( 'woocommerce' );

/**
 * START THEME INIT
 */
if(!function_exists('dd_theme_init')):

function dd_theme_init() {
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );
	
	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/tweaks.php' );
	
	//include(get_template_directory() . '/inc/walker/cp-product-cat-list-walker.php');
	/**
	 * Make theme available for Translations
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Fruitful theme, use a find and replace
	 * to change 'fruitful' to the name of your theme in all the template files
	 **/
	load_theme_textdomain( 'creativepop', get_template_directory() . '/languages' );
	
	/**
	 * Add default posts and comments RSS feed links to header
	 */
	add_theme_support( 'automatic-feed-links' );
	/**
	 * Enable support for Post thumbnails
	 */
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	
	register_nav_menus(array(
	    'primary' => __('Primary Menu')
    	));
	
	register_nav_menus(array(
	    'footer' => __('Footer Menu')
    	));

}

endif;

add_action( 'after_setup_theme', 'dd_theme_init' );

/**
 * Call Theme Options Menu File
 */
require_once('theme-options.php');
	
/**
 * Custom functions and definitions for woocommerce
 */
require_once('woo-functions.php'); 

include_once(dirname(dirname(__FILE__)) . '/creativepop/inc/walker/walker_nav_menu_dropdown.php');
include_once(dirname(dirname(__FILE__)) . '/creativepop/inc/walker/wc_materialize_product_cat_list_walker.php');

/** END THEME INIT **/


/**
 * Register and load CSS styles to template
 */
if(!function_exists('dd_enqueue_style')) {
	function dd_enqueue_style() {
		// Remove all default woocommerce style
		wp_dequeue_style('woocommerce-layout');
		wp_dequeue_style('woocommerce-general');
		wp_dequeue_style('woocommerce-smallscreen');
		wp_dequeue_style('woocommerce_prettyPhoto_css');

		// Normalize.css
		wp_register_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css');
		wp_enqueue_style('normalize');
		
		// Materialize CSS
		wp_register_style('materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css');
		wp_register_style('materialize-icon', 'http://fonts.googleapis.com/icon?family=Material+Icons');
		wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css');

		wp_enqueue_style('materialize');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style('materialize-icon');

		// OwlCarousel
		wp_register_style('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css');
		wp_register_style('owl-carousel-theme', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css');
		wp_enqueue_style('owl-carousel');
		wp_enqueue_style('owl-carousel-theme');
		
		wp_register_style('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css');
		wp_enqueue_style('magnific-popup');
		
		//Animate.css
		wp_register_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css');
		wp_enqueue_style('animate');
		
		// Stylesheet
		wp_enqueue_style('stylesheet', get_stylesheet_uri());
	}
	
	add_action('wp_print_styles', 'dd_enqueue_style');
}

if(!function_exists('dd_enqueue_scripts')) {
	function dd_enqueue_scripts() {
		wp_deregister_script('jquery');
		wp_register_script('jquery-2.1.4', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js');
		wp_enqueue_script('jquery-2.1.4');
		
		wp_register_script('materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js');
		wp_enqueue_script('materialize');
		
		wp_register_script('wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js');
		wp_enqueue_script('wow');
		
		wp_register_script('owl-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js');
		wp_enqueue_script('owl-carousel');

		wp_register_script('google-recaptcha', 'https://www.google.com/recaptcha/api.js');
		wp_enqueue_script('google-recaptcha');
		
		wp_register_script('magnific-popup', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js');
		wp_enqueue_script('magnific-popup');
		
		wp_register_script('animateOnScroll', get_template_directory_uri() . '/js/animateOnScroll.js' );
		wp_enqueue_script('animateOnScroll');
		
		wp_register_script('custom-js', get_template_directory_uri() . '/js/custom.js' );
		wp_enqueue_script('custom-js');
		
		wp_register_script('snow-js', get_template_directory_uri() . '/js/snowstorm-min.js' );
		wp_enqueue_script('snow-js');
	}
	
	add_action('wp_enqueue_scripts', 'dd_enqueue_scripts');
}

function dd_get_options($name) {
	return array_filter((array) get_option($name));
}

/* prevent admin bar from pushing the site down */
add_action('get_header', 'my_filter_head');
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

/** SHORTCODES & REGISTER SHORTCODES **/
function register_shortcodes() {
	add_shortcode('creativepop_contact_form', 'creativepop_contact_form');
	add_shortcode('um_pricing_page', 'um_pricing_page');
}
add_action('init', 'register_shortcodes');


function creativepop_contact_form() {
	wc_get_template('contact.php');
}

function um_pricing_page() {
	wc_get_template('pricing.php');
}

/****************************************/

add_filter('woocommerce_product_categories_widget_args', 'dd_product_categories_widget_args', 10, 1);
function dd_product_categories_widget_args($args) {
	$args['walker'] = new WC_Materialize_Product_Cat_List_Walker();
	return $args;
}

/* Customize WP_MEMBER User Registration Form */
add_filter('wpmem_register_form_args', 'wpmem_materialize_reg_form_args');
function wpmem_materialize_reg_form_args() {
	return array(
		// wrappers
		'heading_before'   => '<div style="display:none">',
		'heading_after'    => '</div>',
		'fieldset_before'  => '',
		'fieldset_after'   => '',
		'main_div_before'  => '<div class="row">',
		'main_div_after'   => '</div>',
		'txt_before'       => '[wpmem_txt]',
		'txt_after'        => '[/wpmem_txt]',
		'row_before'       => '<div class="row"><div class="input-field col s12">',
		'row_after'        => '</div></div>',
		'buttons_before'   => '',
		'buttons_after'    => '',
		
		// classes & ids
		'form_id'          => '',
		'form_class'       => 'col s12 m12 l10 offset-l1',
		'button_id'        => '',
		'button_class'     => 'btn',
		
		// required field tags and text
		'req_mark'         => '',
		'req_label'        => '',
		'req_label_before' => '',
		'req_label_after'  => '',
		
		// buttons
		'show_clear_form'  => false,
		'clear_form'       => __( 'Reset Form', 'wp-members' ),
		'submit_register'  => __( 'Register' ),
		'submit_update'    => __( 'Update Profile', 'wp-members' ),
		
		// other
		'strip_breaks'     => true,
		'use_nonce'        => false,
		'wrap_inputs'      => false,
		'n'                => "\n",
		't'                => "\t",
	);
}

add_action('wpmem_register_redirect', 'creativepop_register_redirect');
function creativepop_register_redirect() {
	// NOTE: this is an action hook that uses wp_redirect.
	// wp_redirect must always be followed by exit();
	$GLOBALS['registerSuccess'] = true;
	
	wp_redirect('/my-account');
	exit();
}
