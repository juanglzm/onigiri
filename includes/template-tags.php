<?php
/**
 * Template Tags
 *
 * @package    Onigiri
 * @since      1.0.0
 **/

namespace ZKI\Onigiri;

/**
 * Display the comments if required
 *
 * @return void
 */
function print_comments() : void {
	if ( comments_open() && ! post_password_required() ) {
		comments_template();
	}
}
