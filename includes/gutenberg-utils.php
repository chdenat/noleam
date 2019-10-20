<?php

/**
 * GUTENBERG UTILS
 */

namespace NOLEAM\THEME;

/**
 * Les couleurs chartées
 */

add_theme_support( 'editor-color-palette', [
		[
			'name'  => 'Bleu',
			'slug'  => 'bleu-noleam',
			'color' => '#004899',
		],
		[
			'name'  => 'Orange',
			'slug'  => 'orange-noleam',
			'color' => '#ff3a2d',
		],
		[
			'name'  => 'Vert',
			'slug'  => 'vert-noleam',
			'color' => '#81d742',
		],
		[
			'name'  => 'Jaune',
			'slug'  => 'jaune-noleam',
			'color' => '#ffcc00',
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


/**
 * Rajout du CSS pour la partie édition
 */

function css_enqueue_gutenberg() {
	wp_enqueue_style( 'css-gutenberg', ASSETS . '/css/charte.css', [ 'wp-edit-blocks' ], wp_get_theme()->get( 'Version' ) );
}

add_action( 'enqueue_block_editor_assets', 'NOLEAM\THEME\css_enqueue_gutenberg' );