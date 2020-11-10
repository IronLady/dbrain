<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DigitalBrain
 */

$background_404 = get_field( '404_header_image', 'option' );

get_header(); ?>
	<main id="primary" class="site-main">
		<section class="pb-block full-width pb-contact">
			<div class="pb-contact__mini-hero" style="background-image:url(<?php echo $background_404['url']; ?>);">
				<div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/contact.svg" alt=""></div>
			</div>
			<div class="container container-narrow">
				<div class="pb-contact__wrap">
					<div class="pb-contact__left">
						<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dbrain' ); ?></h3>
						<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'dbrain' ); ?></p>
					</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->
	<aside class="before-footer <?php echo dbrain_footer_class(); ?>" <?php echo dbrain_footer_background(); ?>>
		<?php dbrain_display_footer_blocks(); ?>
	</aside>
<?php get_footer();