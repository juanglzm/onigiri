<?php
/**
 * Default Archive Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

get_header();
?>
<header class="header">
	<h1 class="entry-title" itemprop="name"><?php the_archive_title(); ?></h1>
	<div class="archive-meta" itemprop="description">
		<?php
		if ( '' !== get_the_archive_description() ) {
			echo esc_html( get_the_archive_description() );
		}
		?>
	</div>
</header>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/entry/entry' );
	endwhile;
endif;
get_template_part( 'partials/nav/nav', 'below' );
get_footer();
