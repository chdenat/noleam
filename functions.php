<?php

namespace NOLEAM\THEME;


use NOLEAM\CSS\Palette_Synchroniser;

define( 'THEME_PATH', __DIR__ );
define( 'THEME_URL', get_stylesheet_directory_uri() ) . '/';

define( 'ASSETS', '/assets/' );
define( 'THEME_INC_PATH_URL', THEME_URL . '/includes/' );
define( 'THEME_CSS_URL', THEME_URL . ASSETS . 'css/' );
define( 'THEME_JS_URL', THEME_URL . ASSETS . 'javascript/' );

define( 'THEME_ASSETS_PATH', THEME_PATH . ASSETS );
define( 'THEME_CSS_PATH', THEME_ASSETS_PATH . '/css' );
define( 'THEME_JS_PATH', THEME_ASSETS_PATH . '/javascript' );
define( 'THEME_INC_PATH', THEME_PATH . '/includes/' );


require_once THEME_INC_PATH . '/customizer.php';


if ( is_admin() ) {
	require_once THEME_INC_PATH . 'gutenberg-utils.php';
}


function theme_enqueue() {
	$parent_style = 'parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	//wp_enqueue_style( 'child-style', THEME_CSS_URL . '/style.css', array( $parent_style ) );
	wp_enqueue_style( 'charte', THEME_CSS_URL . '/charte.css', array( $parent_style ) );

	wp_enqueue_script( 'noleam', THEME_JS_URL . '/script.js' );
	wp_enqueue_script( 'fa-pro', "https://kit.fontawesome.com/e4a29cef7a.js" );
}

add_action( 'wp_enqueue_scripts', 'NOLEAM\THEME\theme_enqueue', 11 );


// Enable shortcodes in text widgets
add_filter( 'widget_text', 'do_shortcode' );

function block_public( $args, $post_type ) {
	if ( 'wp_block' === $post_type ) {
		$args['public'] = true;
	}

	return $args;
}

//add_filter( 'register_post_type_args', 'NOLEAM\THEME\block_public', 10, 2 );

/**
 *
 * Add svg mime type
 *
 * @param $mimes
 *
 * @return mixed
 */
function cc_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter( 'upload_mimes', 'NOLEAM\THEME\cc_mime_types' );


/**
 *  Palette Synchroniser customisation
 */
if ( class_exists( Palette_Synchroniser::class ) ) {
	Palette_Synchroniser::getInstance( [
		'color_slugs' => [
			'bleu-noleam',
			'orange-noleam',
			'vert-noleam',
			'jaune-noleam',
			'bleu-clair-noleam',
			'blanc',
			'noir',
			'couleur-texte',
		],
		'prefix'      => 'name',
		'file'        => get_stylesheet_directory() . '/assets/css/charte.css',
	] );

}