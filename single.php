<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DigitalBrain
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
		the_post(); 
		$category = get_the_category(); ?>

			<section class="pb-block full-width pb-hero-service pb-hero-single-blog pb-block-with-background">
				<div class="container container-small">
					<div class="pb-hero-service__intro">
						<div class="pb-hero-service__intro-text">
							<h1 class="heading-with-separator"><?php echo get_the_title(); ?></h1>
							<p><?php printf( '%s &nbsp;&bull;&nbsp; %s', strtoupper( $category[0]->name ), get_the_date() ); ?></p>
						</div>
						<div class="pb-hero-service__intro-image">
							<span><?php echo get_the_post_thumbnail( get_the_ID(), 'articles-hero' ); ?></span>
						</div>
					</div>
				</div>

				<div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/blog-single.svg" alt=""></div>
			</section>

			<?php get_template_part( 'template-parts/content', get_post_type() );
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->
	<aside class="before-footer" <?php echo dbrain_footer_background(); ?>>
		<?php get_template_part( 'template-parts/blocks/block', 'articles' ); ?>
		<?php dbrain_display_global_footer_blocks(); ?>
	</aside>
<?php
get_footer();
