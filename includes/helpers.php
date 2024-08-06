<?php
/**
 * Helper Functions
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Limit the excerpt length
 *
 * @param array $args Parameters include length, more text and post ID.
 * @return string The trimmed excerpt.
 */
function get_trimmed_excerpt( array $args = [] ) : string {
	// Set defaults.
	$defaults = [
		'lenght' => 20,
		'more'   => '...',
		'post'   => '',
	];

	// Parse arguments.
	$args = wp_parse_args( $args, $defaults );

	// Trim the excerpt.
	return wp_trim_words( get_the_excerpt( $args['post'] ), absint( $args['lenght'] ), esc_html( $args['more'] ) );
}

/**
 * Print a button using the same structure as a core/button block
 *
 * @param string $text   Button text
 * @param string $url    Anchor destination.
 * @param string $target Anchor target, could be _blank or _self.
 * @param array $classes Collection of classes to be added to the main button wrapper.
 * @return string
 */
function generate_wp_button( string $tag = 'div', string $text = '', string $url = '', string $target = '', array $classes = [], array $data_attrs = [] ) : string {
	$data_attrs_arr = [];
	if ( ! empty( $data_attrs ) ) {
		foreach ( $data_attrs as $key => $value ) {
			$data_attrs_arr[] = $key . '="' . $value . '"';
		}
	}

	return sprintf(
		'<%5$s class="wp-block-button %4$s" %7$s><%6$s %2$s %3$s class="wp-block-button__link wp-element-button">%1$s</%6$s></%5$s>',
		esc_html( $text ),
		esc_html( $tag !== 'button' ? 'href="' . esc_url( $url ) . '"' : '' ),
		esc_html( $tag !== 'button' ? 'target="' . esc_attr( $target ) . '"' : '' ),
		join( ' ', $classes ),
		esc_html( $tag ),
		esc_html( $tag !== 'button' ? 'a' : 'span' ),
		join( '', $data_attrs_arr )
	);
}
