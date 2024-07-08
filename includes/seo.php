<?php
/**
 * SEO related functions
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Add default title tag separator
 *
 * @param  string $sep Document title separator.
 * @return string $sep
 */
function document_title_separator( string $sep ) : string {
	$sep = esc_html( '|' );
	return $sep;
}
add_filter( 'document_title_separator', __NAMESPACE__ . '\document_title_separator' );

/**
 * Prints the adecuate item scope for the content type
 */
function schema_type() : void {
	$schema = 'https://schema.org/';
	if ( is_single() ) {
		$type = 'Article';
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}

	$type = apply_filters( 'onigiri_schema_type', $type );

	echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}

/**
 * Add Item Prop schema to menu links
 *
 * @param array $atts The HTML attributes applied to the menu item's element.
 * @return array $atts
 */
function schema_url( array $atts ) : array {
	$atts['itemprop'] = 'url';
	return $atts;
}
add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\schema_url', 10 );


/**
 * Add missing itemprop to wp custom logo
 *
 * @return string $html the_custom_logo updated markup.
 */
function add_logo_itemprop() : string {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$html = sprintf(
		'<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
		esc_url( home_url( '/' ) ),
		str_replace( '>', 'itemprop="logo">', wp_get_attachment_image( $custom_logo_id, 'full', false, [ 'class'    => 'custom-logo' ] ) )
	);
	return $html;
}
add_filter( 'get_custom_logo', __NAMESPACE__ . '\add_logo_itemprop' );
