<?php
/**
 * Entry Footer Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

?>
<footer class="entry-footer">
	<span class="cat-links"><?php esc_html_e( 'Categories: ', 'onigiri' ); ?><?php the_category( ', ' ); ?></span>
	<span class="tag-links"><?php the_tags(); ?></span>
	<?php
	if ( comments_open() ) {
		echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'onigiri' ) ) . '</a></span>';
	}
	?>
</footer>
