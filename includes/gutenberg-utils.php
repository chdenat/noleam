<?php

/**
 * GUTENBERG UTILS
 */

namespace NOLEAM\THEME;


add_action( 'after_setup_theme', function () {

	add_theme_support( 'editor-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'disable-custom-font-sizes' );
	add_theme_support( 'responsive-embeds' );

	//add_theme_support( 'wp-block-styles' );

} );


add_action( 'enqueue_block_editor_assets', function () {
	$block_dep = [ 'wp-edit-blocks', 'wp-nux', 'wp-block-editor', 'wp-edit-post' ];
	wp_enqueue_style( 'charte-admin', THEME_CSS_URL . 'charte.css', $block_dep, '1.0' );
	wp_enqueue_style( 'editor-style-admin', THEME_CSS_URL . 'style.css', [ 'charte-admin' ], '1.0' );
} );
