<?php
/**
 * Site Footer
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

?>
</main>
<?php get_sidebar(); ?>
</div>
<footer id="footer" role="contentinfo">
	<div id="copyright">
		&copy; <?php echo esc_html( date_i18n( __( 'Y', 'onigiri' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
