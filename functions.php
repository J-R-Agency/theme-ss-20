<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

/*-- ADD ACF OPTIONS --*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page("Header");
	acf_add_options_sub_page("Company Info");
	acf_add_options_sub_page("Global");
}

// Enqueue javascript
function my_theme_scripts() {
    wp_enqueue_script( 'login-button', get_template_directory_uri() . '/js/login-button.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// Register Menus
function register_my_menu() {
	register_nav_menu('secondary-menu',__( 'Secondary Menu' ));
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
	register_nav_menu('products-menu',__( 'Products Menu' ));
}
add_action( 'init', 'register_my_menu' );

//Add categories to pages
function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'post_tag', 'page' );
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

// Add support for Social Menu.
function theme_slug_jetpack_setup() {
  add_theme_support( 'jetpack-social-menu' );
}
add_action( 'after_setup_theme', 'theme_slug_jetpack_setup' );
