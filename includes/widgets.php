<?php
/**
 * Comments
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Register Theme Sidebars.
 */
function theme_widgets_init() : void {
	register_sidebar(
		[
			'name'          => esc_html__( 'Sidebar Widget Area', 'onigiri' ),
			'id'            => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]
	);
}
add_action( 'widgets_init', __NAMESPACE__ . '\theme_widgets_init' );
