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
