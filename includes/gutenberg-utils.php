<?php

/**
 * GUTENBERG UTILS
 */

namespace NOLEAM\THEME;


function theme_setup() {

add_theme_support( 'editor-color-palette', [
		[
			'name'  => 'Bleu',
			'slug'  => 'bleu-noleam',
			'color' => '#1072B3',
		],
		[
			'name'  => 'Bleu Clair',
			'slug'  => 'bleu-clair-noleam',
			'color' => '#61BFFF',
		],
		[
			'name'  => 'Orange',
			'slug'  => 'orange-noleam',
			'color' => '#FF4B45',
		],
		[
			'name'  => 'Vert',
			'slug'  => 'vert-noleam',
			'color' => '#9AB345',
		],
		[
			'name'  => 'Jaune',
			'slug'  => 'jaune-noleam',
			'color' => '#CCA640',
		],
		[
			'name'  => 'Blanc',
			'slug'  => 'blanc',
			'color' => '#fff',
		],
		[
			'name'  => 'Noir',
			'slug'  => 'noir',
			'color' => '#000',
		],
	]
);

	add_theme_support( 'editor-styles' );
	add_editor_style( CSS_DIR . '/charte.css' );
	add_editor_style( CSS_DIR . '/editor.css' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support( 'disable-custom-font-sizes' );
}

add_action( 'after_setup_theme', 'NOLEAM\THEME\theme_setup' );


/**
 * Rajout du CSS pour la partie édition
 */

function css_enqueue_gutenberg() {
	//wp_enqueue_style( 'charte-noleam', CSS_DIR . '/charte.css', [ 'wp-edit-blocks' ], wp_get_theme()->get( 'Version' ) );
}

add_action( 'enqueue_block_editor_assets', 'NOLEAM\THEME\css_enqueue_gutenberg' );

