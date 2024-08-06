<?php
/**
 * Theme Setup
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Theme initial setup.
 */
function theme_setup() : void {
	load_theme_textdomain( 'onigiri', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'meta',
		'style',
		'script',
		'navigation-widgets'
	) );
	add_theme_support( 'editor-styles' );
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 860;
	}

	$custom_logo_defs = [
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
	];
	add_theme_support( 'custom-logo', $custom_logo_defs );

	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'onigiri' ),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );

// Disable scaling of big images.
add_filter( 'big_image_size_threshold', '__return_false' );

/**
 * Modify default WordPress image sizes.
 *
 * @param array $sizes Associative array of image sizes to be created.
 * @return array
 */
function image_insert_override( array $sizes ) : array {
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', __NAMESPACE__ . '\image_insert_override' );

/**
 * Add pingback link to header.
 */
function pingback_header() : void {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\pingback_header' );

/**
 * Change the markup for the read more link inside the content.
 *
 * @return string Read More link element.
 */
function theme_read_more_link() : string {
	if ( ! is_admin() ) {
		// translators: Read More Link text.
		return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'onigiri' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}
add_filter( 'the_content_more_link', __NAMESPACE__ . '\theme_read_more_link' );

/**
 * Change the markup for the read more link inside the excerpt.
 *
 * @param string $more_string The string shown within the more link.
 * @return string
 */
function excerpt_read_more_link( string $more_string ) : string {
	if ( ! is_admin() ) {
		global $post;
		// translators: Excerpt read more text.
		return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'onigiri' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
	}
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_read_more_link' );

/**
 * Disable gutenberg in specific post types
 *
 * @param bool   $current_status Whether the post type can be edited or not.
 * @param string $post_type      The post type being checked.
 * @return bool
 */
function disable_block_editor_for_posttypes( bool $current_status, string $post_type ) : bool {
	$disabled_post_types = [
		'page',
	];

	if ( in_array( $post_type, $disabled_post_types ) ) {
		return false;
	}

	return $current_status;
}
add_filter( 'use_block_editor_for_post_type', __NAMESPACE__ . '\disable_block_editor_for_posttypes', 10, 2 );
