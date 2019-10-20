<?php

namespace NOLEAM\THEME;

remove_action( 'customize_register', 'wp_bootstrap_starter_customize_register' );
function customization( $wp_customize ) {
	return null;
}

add_action( 'customize_register', '\NOLEAM\THEME\customization' );
