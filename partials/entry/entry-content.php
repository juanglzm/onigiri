<?php
/**
 * Entry Content Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

?>
<div class="entry-content wrap" itemprop="mainEntityOfPage">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php $attachment_id = get_post_thumbnail_id( $post->ID ); ?>
		<a
			href="<?php the_post_thumbnail_url( 'full' ); ?>"
			title="<?php the_title_attribute( array( 'post' => get_post( $attachment_id ) ) ); ?>"
		>
			<?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
		</a>
	<?php endif; ?>
	<meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>">
	<?php the_content(); ?>
	<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>
