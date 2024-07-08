<?php
/**
 * Nav Below Template Part
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

$args = [
	// translators: post navigation prev.
	'prev_text' => '<span class="meta-nav">&larr;</span> %title',
	// translators: post navigation next.
	'next_text' => '%title <span class="meta-nav">&rarr;</span>',
];
the_post_navigation( $args );
