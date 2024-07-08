<?php
/**
 * ACF Customizations
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

// Disable CPT and taxonomy functionality
add_filter( 'acf/settings/enable_post_types', '__return_false' );

// Don't output empty message on blocks
add_filter( 'acf/blocks/no_fields_assigned_message', '__return_empty_string' );

/**
 * Remove ACF admin menu
 */
function remove_acf_admin_menu() : void {
	if ( ! ( function_exists( 'wp_get_environment_type' ) && 'production' === wp_get_environment_type() ) ) {
		return;
	}

	$slug = 'edit.php?post_type=acf-field-group';
	remove_submenu_page( $slug, $slug );
	remove_submenu_page( $slug, 'post-new.php?post_type=acf-field-group' );
}
add_action( 'admin_menu', __NAMESPACE__ . '\remove_acf_admin_menu' );
