<?php
/**
 * Nav Below Template Part
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

$args = [
	// translators: Older posts.
	'prev_text' => sprintf( esc_html__( '%s older', 'onigiri' ), '<span class="meta-nav">&larr;</span>' ),
	// translators: Newers posts.
	'next_text' => sprintf( esc_html__( 'newer %s', 'onigiri' ), '<span class="meta-nav">&rarr;</span>' ),
];
the_posts_navigation( $args );
