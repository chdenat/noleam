<?php

namespace NOLEAM\THEME;


use function NOLEAM\DEV\debug_;
use function NOLEAM\DEV\echo_;

define( 'ASSETS', '/assets/' );
define( 'THEME_INC', __DIR__ . '/includes/' );
define( 'THEME_CSS', __DIR__ . ASSETS . 'css/' );
define( 'THEME_JS', __DIR__ . ASSETS . 'javascript/' );

define( 'THEME_DIR', get_stylesheet_directory_uri() ) . '/';
define( 'ASSETS_DIR', THEME_DIR . ASSETS );
define( 'CSS_DIR', ASSETS_DIR . '/css' );
define( 'JS_DIR', ASSETS_DIR . '/javascript' );

require_once THEME_INC . '/customizer.php';


if ( is_admin() ) {
	require_once THEME_INC . 'gutenberg-utils.php';
}


function theme_enqueue() {
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	//wp_enqueue_style( 'child-style', CSS_DIR . '/style.css', array( $parent_style ) );
	wp_enqueue_style( 'charte', CSS_DIR . '/charte.css', array( $parent_style ) );

	wp_enqueue_script( 'sticker', JS_DIR . '/jquery.sticky.js');
	wp_enqueue_script( 'noleam', JS_DIR . '/script.js' );

}
add_action( 'wp_enqueue_scripts', 'NOLEAM\THEME\theme_enqueue', 1000 );


// Enable shortcodes in text widgets
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'https_ssl_verify', '__return_false' );
add_filter( 'https_local_ssl_verify', '__return_false' );

function block_public( $args, $post_type ) {
	if ( 'wp_block' === $post_type ) {
	$args['public'] = true;
	}
	return $args;
}

//add_filter( 'register_post_type_args', 'NOLEAM\THEME\block_public', 10, 2 );

