<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DigitalBrain
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="pb-hero-work pb-hero-archive pb-block full-width pb-block-with-background" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/single-blog.svg);">
			<div class="container container-small">
				<div class="pb-hero-work__intro">
					<div class="pb-hero-work__intro-text">
						<h1 class="heading-with-separator"><?php echo get_queried_object()->name; ?></h1>
					</div>
				</div>
			</div>

			<div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/blog.svg" alt=""></div>
		</section>

		<?php
		if ( have_posts() ) : ?>
			<section class="pb-block pb-articles">
				<div class="container">
					<div class="pb-articles__items">
					<?php 
						while ( have_posts() ) :
						the_post(); 
						$category = get_the_category(); ?>
							<div class="pb-articles__item">
								<div class="pb-articles__item-image"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'articles-thumb' ); ?></a></div>
								<div class="pb-articles__item-content">
									<span><a href="<?php echo get_term_link( $category[0]->term_id ); ?>"><?php echo $category[0]->name; ?></a></span>
									<h3><?php echo get_the_title(); ?></h3>
									<a href="<?php echo get_permalink(); ?>" class="button">Read Story</a>
								</div>
							</div>
						<?php endwhile; ?>
					</div>

					<?php the_posts_navigation( array( 'prev_text' => 'See More Articles' ) ); ?>
				</div>
			</section>
			

		<?php else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>

	</main><!-- #main -->
	<aside class="before-footer" <?php echo dbrain_footer_background(); ?>>
		<?php dbrain_display_global_footer_blocks(); ?>
	</aside>
<?php
get_footer();
