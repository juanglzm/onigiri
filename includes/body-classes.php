<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @source https://github.com/billerickson/BE-Starter/blob/master/inc/helper-functions.php
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes
 * @return array
 */
function body_classes( array $classes ) : array {

	// Are we on mobile?.
	if ( wp_is_mobile() ) {
		$classes[] = 'mobile';
	}

	// Set layout.
	// Options: l-fullwidth-content l-content-sidebar l-sidebar-content
	// Set a default.
	$layout = 'l-content-sidebar';
	// TODO: Get the body class from setting.

	// Add class to body.
	$classes[] = $layout;

	$classes[] = 'no-js';

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\body_classes' );
