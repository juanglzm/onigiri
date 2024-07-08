<?php
/**
 * Default Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/entry/entry' );
		comments_template();
	endwhile;
endif;
get_template_part( 'partials/nav/nav', 'below' );
get_footer();
