<?php
/**
 * Theme specific styles and scripts
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Load Editor scripts
 */
function theme_admin_assets() : void {
	wp_enqueue_script(
		'theme-editor',
		get_theme_file_uri( 'public/js/admin.js' ),
		[],
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_style(
		'theme-editor',
		get_theme_file_uri( 'public/css/admin.css' ),
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'admin_enque_scripts', __NAMESPACE__ . '\theme_admin_assets' );

/**
 * Load front-end scripts
 */
function theme_frontend_assets() : void {
	wp_enqueue_script(
		'theme-scripts',
		get_theme_file_uri( 'public/js/app.js' ),
		[],
		wp_get_theme()->get( 'Version' ),
		true
	);

	wp_enqueue_style(
		'theme-styles',
		get_theme_file_uri( 'public/css/style.css' ),
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\theme_frontend_assets' );
