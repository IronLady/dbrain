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

get_header(); ?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			dbrain_display_pb_blocks();
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
	<aside class="before-footer <?php echo dbrain_footer_class(); ?>" <?php echo dbrain_footer_background(); ?>>
		<?php dbrain_display_footer_blocks(); ?>
		
		<?php if( dbrain_footer_class() != 'before-footer__default' ): ?>
			<div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/service-link.svg" alt=""></div>
		<?php endif; ?>
	</aside>
<?php get_footer();