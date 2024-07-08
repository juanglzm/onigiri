<?php
/**
 * WooCommerce related functions
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Add support for WooCommerce.
 */
function theme_wc_setup() : void {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_wc_setup' );
