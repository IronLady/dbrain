<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DigitalBrain
 */

?>

	<footer id="colophon" class="site-footer">
		<section class="pb-block full-width pb-copyright pb-block-with-background">
			<div class="pb-copyright__inner">
				<div class="site-branding">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php echo get_bloginfo('name'); ?>">
				</div>

				<p class="pb-copyright__address"><?php echo get_field( 'footer_address', 'option' ); ?></p>
			</div>
			<hr>
			<div class="pb-copyright__inner">
				<p class="pb-copyright__content"><?php echo get_field( 'footer_copyright', 'option' ); ?></div>
			</div>
		</section>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
