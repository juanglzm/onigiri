<?php
/**
 * Security
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Remove generator meta tags.
 */
add_filter( 'the_generator', '__return_false' );

/**
 * Disable XML RPC.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Change REST-API header from "null" to "*"
 *
 * @see https://w3c.github.io/webappsec-cors-for-developers/#avoid-returning-access-control-allow-origin-null
 */
function cors_control() : void {
	header( 'Access-Control-Allow-Origin: *' );
}
add_action( 'rest_api_init', __NAMESPACE__ . '\cors_control' );
