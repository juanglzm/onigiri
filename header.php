<?php
/**
 * Site Header
 *
 * @package    Onigiri
 * @since      1.0.0
 */

use ZKI\Onigiri;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php Onigiri\schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="wrapper" class="hfeed">
		<header id="header" class="site-header" role="banner">
			<div class="wrap-wide">
				<div itemscope itemtype="https://schema.org/Organization">
					<?php if ( has_custom_logo() ) : ?>
						<?php the_custom_logo(); ?>
					<?php else : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" itemprop="url">
							<span itemprop="name"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></span>
						</a>
					<?php endif; ?>
				</div>
				<a href="#primary-nav" aria-controls="primary-nav" class="site-menu-toggle">
					<span class="screen-reader-text">Primary Menu</span>
					<span aria-hidden="true">
						<?php echo Onigiri\theme_icon( [ 'icon' => 'menu' ] ); //phpcs:ignore ?>
					</span>
				</a>
				<nav class="site-navigation" role="navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" aria-label="Primary Navigation">
					<?php
					wp_nav_menu(
						[
							'theme_location' => 'main-menu',
							'menu_class'     => 'primary-menu',
							'menu_id'        => 'primary-nav',
						]
					);
					?>
				</nav>
			</div>
		</header>
		<div id="container" class="site-container">
			<main id="site-content" role="main">
