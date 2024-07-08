<?php
/**
 * Search Results Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

get_header();
?>
<?php
if ( have_posts() ) :
	?>
	<header class="header">
		<h1 class="entry-title" itemprop="name">
			<?php
			// translators: Search results title.
			printf( esc_html__( 'Search Results for: %s', 'onigiri' ), get_search_query() );
			?>
		</h1>
	</header>
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'partials/entry/entry' );
	endwhile;
	get_template_part( 'partials/nav/nav', 'below' );
else :
	?>
	<article id="post-0" class="post no-results not-found">
		<header class="header">
			<h1 class="entry-title" itemprop="name"><?php esc_html_e( 'Nothing Found', 'onigiri' ); ?></h1>
		</header>
		<div class="entry-content" itemprop="mainContentOfPage">
			<p><?php esc_html_e( 'Sorry, nothing matched your search. Please try again.', 'onigiri' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>
	<?php
endif;
get_footer();
