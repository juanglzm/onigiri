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
function theme_editor_assets() : void {
	$editor_script = require_once get_theme_file_path( 'build/js/editor.asset.php' );
	wp_enqueue_script(
		'theme-editor',
		get_theme_file_uri( 'build/js/editor.js' ),
		$editor_script['dependencies'],
		$editor_script['version'],
		true
	);

	$editor_style = require_once get_theme_file_path( 'build/css/editor.asset.php' );
	wp_enqueue_style(
		'theme-editor',
		get_theme_file_uri( 'build/css/editor.css' ),
		[],
		$editor_style['version']
	);
}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\theme_editor_assets' );

/**
 * Load Admin scripts
 */
function theme_admin_assets() : void {
	$admin_script = require_once get_theme_file_path( 'build/js/admin.asset.php' );
	wp_enqueue_script(
		'theme-admin',
		get_theme_file_uri( 'build/js/admin.js' ),
		$admin_script['dependencies'],
		$admin_script['version'],
		true
	);

	$admin_style = require_once get_theme_file_path( 'build/css/admin.asset.php' );
	wp_enqueue_style(
		'theme-admin',
		get_theme_file_uri( 'build/css/admin.css' ),
		[],
		$admin_style['version']
	);
}
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\theme_admin_assets' );

/**
 * Load front-end scripts
 */
function theme_frontend_assets() : void {
	$fe_script = require_once get_theme_file_path( 'build/js/frontend.asset.php' );
	wp_enqueue_script(
		'theme-scripts',
		get_theme_file_uri( 'build/js/frontend.js' ),
		$fe_script['dependencies'],
		$fe_script['version'],
		true
	);

	$fe_style = require_once get_theme_file_path( 'build/css/frontend.asset.php' );
	wp_enqueue_style(
		'theme-styles',
		get_theme_file_uri( 'build/css/frontend.css' ),
		[],
		$fe_style['version'],
	);
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\theme_frontend_assets' );
