<?php
/**
 * Single Posts Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

use function ZKI\Onigiri\print_comments;

get_header();
?>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/entry/entry' );
		print_comments();
	endwhile;
endif;
?>
<footer class="footer">
	<?php get_template_part( 'partials/nav/nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>
