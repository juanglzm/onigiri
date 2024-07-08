<?php
/**
 * Entry Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<?php
		if ( is_singular() ) {
			echo '<h1 class="entry-title" itemprop="headline">';
		} else {
			echo '<h2 class="entry-title">';
		}
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<?php
		if ( is_singular() ) {
			echo '</h1>';
		} else {
			echo '</h2>';
		}
		?>
		<?php
		edit_post_link();
		if ( ! is_search() ) {
			get_template_part( 'partials/entry/entry', 'meta' );
		}
		?>
	</header>
	<?php
	get_template_part( 'partials/entry/entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) );
	if ( is_singular() ) {
		get_template_part( 'partials/entry/entry', 'footer' );
	}
	?>
</article>
