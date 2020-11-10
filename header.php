<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DigitalBrain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header dbrain-<?php echo dbrain_get_header_style(); ?> <?php echo dbrain_get_header_style(); ?>">
		<div class="container">
			<div class="site-header__inner">
				<div class="site-branding">
					<a href="<?php echo get_home_urL(); ?>">
						<img class="logo-default" src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php echo get_bloginfo('name'); ?>">
						<img class="logo-light" src="<?php echo get_template_directory_uri(); ?>/images/logo-light.svg" alt="<?php echo get_bloginfo('name'); ?>">
					</a>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle hamburger hamburger--squeeze" type="button" aria-controls="primary-menu" aria-expanded="false">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<div class="main-navigation__inner">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->
