<?php
/**
 * Function that prints out svg icons.
 *
 * @source https://github.com/billerickson/BE-Starter/blob/master/inc/helper-functions.php
 *
 * @package    Onigiri
 * @since      1.0.0
 */

namespace ZKI\Onigiri;

/**
 * Theme Icon
 *
 * @param array $atts Array of attributes for the Icon
 * @return void
 */
function theme_icon( array $atts = [] ) : string {

	$defaults = [
		'icon'   => false,
		'group'  => 'utility',
		'size'   => '24',
		'width'  => false,
		'height' => false,
		'class'  => false,
		'label'  => false,
		'defs'   => false,
		'force'  => false,
	];

	$atts = wp_parse_args( $atts, $defaults );

	if ( empty( $atts['icon'] ) ) {
		return '';
	}

	if ( is_admin() ) {
		$atts['force'] = true;
	}

	$icon_path = get_theme_file_path( 'public/icons/' . $atts['group'] . '/' . $atts['icon'] . '.svg' );

	if ( ! file_exists( $icon_path ) ) {
		return '';
	}

	// Directly display the icon.
	if ( true === $atts['force'] ) {
		ob_start();
		readfile( $icon_path );
		$icon = ob_get_clean();

		if ( false !== $atts['size'] ) {
			// Add extra attributes to svg code.
			$repl = sprintf(
				'<svg width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ',
				$atts['size'],
				$atts['size']
			);
			$svg = preg_replace( '/^<svg /', $repl, trim( $icon ) );
		} elseif ( false === $atts['size'] && ! empty( $atts['width'] ) && ! empty( $atts['height'] ) ) {
			$repl = sprintf(
				'<svg width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ',
				$atts['width'],
				$atts['height']
			);
			$svg = preg_replace( '/^<svg /', $repl, trim( $icon ) );
		} else {
			$svg = preg_replace( '/^<svg /', '<svg ', trim( $icon ) );
		}

		$svg = preg_replace( "/([\n\t]+)/", ' ', $svg );
		$svg  = preg_replace( '/>\s*</', '><', $svg );

		if ( ! empty( $atts['class'] ) ) {
			$svg = preg_replace( '/^<svg /', '<svg class="' . $atts['class'] . '"', $svg );
		}

	} elseif ( true === $atts['defs'] ) {
		// Display the icon as a symbol in defs.
		ob_start();
		readfile( $icon_path );
		$icon = ob_get_clean();

		$svg = preg_replace( '/^<svg /', '<svg id="' . $atts['group'] . '-' . $atts['icon'] . '"', trim( $icon ) );
		$svg = str_replace( '<svg', '<symbol', $svg );
		$svg = str_replace( '</svg>', '</symbol>', $svg );
		$svg = preg_replace( "/([\n\t]+)/", ' ', $svg );
		$svg = preg_replace( '/>\s*</', '><', $svg );
	} else {
		// Display reference to icon.
		global $theme_icons;

		if ( empty( $theme_icons[ $atts['group'] ] ) ) {
			$theme_icons[ $atts['group'] ] = [];
		}
		if ( empty( $theme_icons[ $atts['group'] ][ $atts['icon'] ] ) ) {
			$theme_icons[ $atts['group'] ][ $atts['icon'] ] = 1;
		} else {
			$theme_icons[ $atts['group'] ][ $atts['icon'] ]++;
		}

		$attr = '';
		if ( ! empty( $atts['class'] ) ) {
			$attr .= ' class="' . esc_attr( $atts['class'] ) . '"';
		}
		if ( false !== $atts['size'] ) {
			$attr .= sprintf( ' width="%d" height="%d"', $atts['size'], $atts['size'] );
		} elseif ( false === $atts['size'] && ! empty( $atts['width'] ) && ! empty( $atts['height'] ) ) {
			$attr .= sprintf( ' width="%d" height="%d"', $atts['width'], $atts['height'] );
		}
		if ( ! empty( $atts['label'] ) ) {
			$attr .= ' aria-label="' . esc_attr( $atts['label'] ) . '"';
		} else {
			$attr .= ' aria-hidden="true" role="img" focusable="false"';
		}
		$svg = '<svg' . $attr . '><use href="#' . $atts['group'] . '-' . $atts['icon'] . '"></use></svg>';
	}

	return $svg;
}

function theme_icon_definitions() : void {
	global $theme_icons;

	if ( empty( $theme_icons ) ) {
		return;
	}

	echo '<svg style="display:none;"><defs>';
	foreach ( $theme_icons as $group => $icons ) {
		foreach ( $icons as $icon => $count ) {
			echo theme_icon( [ 'icon' => $icon, 'group' => $group, 'defs' => true ] );
		}
	}
	echo '</defs></svg>';
}
add_action( 'wp_footer', __NAMESPACE__ . '\theme_icon_definitions', 20 );
