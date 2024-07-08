<?php
/**
 * Entry Meta Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

?>
<div class="entry-meta">
	<span class="author vcard" <?php echo is_single() ? ' itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">' : '><span>'; ?>
		<?php the_author_posts_link(); ?>
	</span></span>
	<span class="meta-sep"> | </span>
	<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php echo is_single() ? 'itemprop="datePublished" pubdate' : ''; ?>>
		<?php the_time( get_option( 'date_format' ) ); ?>
	</time>
	<?php
	if ( is_single() ) {
		echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '">';
	}
	?>
</div>
