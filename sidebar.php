<?php
/**
 * Default Sidebar Template
 *
 * @package    Onigiri
 * @author     Juan Antonio
 * @since      1.0.0
 */

if ( is_active_sidebar( 'primary-widget-area' ) ) :
	?>
	<aside id="sidebar" role="complementary">
		<div id="primary" class="widget-area">
			<ul class="widget-list">
				<?php dynamic_sidebar( 'primary-widget-area' ); ?>
			</ul>
		</div>
	</aside>
	<?php
endif;
