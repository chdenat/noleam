<?php

namespace NOLEAM\THEME;


define( 'ASSETS','/assets/' );
define( 'THEME_INC', __DIR__. '/includes/' );
define( 'THEME_CSS', __DIR__.ASSETS . 'css/' );

define ('THEME_DIR', get_stylesheet_directory_uri()).'/';
define ('ASSETS_DIR',THEME_DIR.ASSETS);
define( 'CSS_DIR', ASSETS_DIR.'/css');

require_once THEME_INC . '/customizer.php';


if ( is_admin() ) {
	require_once THEME_INC . 'gutenberg-utils.php';
}


function theme_enqueue_styles() {
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', CSS_DIR . '/style.css', array( $parent_style ) );
	wp_enqueue_style( 'charte', CSS_DIR. '/charte.css' );

}
add_action( 'wp_enqueue_scripts', 'NOLEAM\THEME\theme_enqueue_styles', 1000 );


// Enable shortcodes in text widgets
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'https_ssl_verify', '__return_false' );
add_filter( 'https_local_ssl_verify', '__return_false' );

/**
 * Register support for Gutenberg wide images in your theme
 */
function theme_setup() {
	add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'NOLEAM\THEME\theme_setup' );