<?php
/**
 * Theme Functions
 *
 * This file (functions.php) contains custom functions and styles for the etc-theme.
 * It enqueues styles and scripts, and customizes the theme using the WordPress Customizer.
 *
 * @package etc-theme
 */

$bootscore_child_version = '1.0';

/** Style and scripts */
function bootscore_child_enqueue_styles() {
	global $bootscore_child_version;

	// style.css .
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', false, $bootscore_child_version );

	// Compiled main.css .
	$modified_bootscore_child_css = gmdate( 'YmdHi', filemtime( get_stylesheet_directory() . '/css/main.css' ) );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/css/main.css', array( 'parent-style' ), $modified_bootscore_child_css );

	// custom.js .
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, $bootscore_child_version, true );
}
add_action( 'wp_enqueue_scripts', 'bootscore_child_enqueue_styles' );

/**
 * Callback function for removing the icon upload field from theme customizer
 *
 * @param WP_Customize_Manager $wp_customize The Customizer manager instance.
 *                             This parameter provides access to customize theme settings.
 */
function bootscore_child_remove_site_icon_control( $wp_customize ) {
	$wp_customize->remove_control( 'site_icon' );
}
add_action( 'customize_register', 'bootscore_child_remove_site_icon_control' );
