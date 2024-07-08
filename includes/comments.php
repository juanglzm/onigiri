<?php
/**
 * Comments
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Remove URL field from comment form
 *
 * @param array $fields Comment form fields.
 */
function remove_url_from_comment_form( $fields ) : array {
	unset( $fields['url'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', __NAMESPACE__ . '\remove_url_from_comment_form' );

/**
 * Load comments script if required.
 */
function enqueue_comment_reply_script() : void {
	if ( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', __NAMESPACE__ . '\enqueue_comment_reply_script' );

/**
 * Custom Pingback item markup.
 *
 * @param WP_Comment $comment WP_Comment object.
 */
function custom_pings( $comment ) : void {
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
	<?php
}

/**
 * Get the comments counts
 *
 * @param string|int $count  A string representing the number of comments a post has, otherwise 0.
 * @return string|int $count The post comments number.
 */
function theme_comment_count( string|int $count ) : string|int {
	if ( ! is_admin() ) {
		global $id;
		$get_comments     = get_comments( 'status=approve&post_id=' . $id );
		$comments_by_type = separate_comments( $get_comments );
		return count( $comments_by_type['comment'] ); //phpcs:ignore
	} else {
		return $count;
	}
}
add_filter( 'get_comments_number', __NAMESPACE__ . '\theme_comment_count', 0 );
