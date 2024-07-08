<?php
/**
 * Accessibility
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Add skip link to beging of the page.
 */
function skip_link() : void {
	echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'onigiri' ) . '</a>';
}
add_action( 'wp_body_open', __NAMESPACE__ . '\skip_link', 5 );
