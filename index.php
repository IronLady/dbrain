<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DigitalBrain
 */

get_header();
$featured_post = get_field( 'featured_post', get_option( 'page_for_posts' ) );
?>

	<main id="primary" class="site-main">
	<?php if( is_home() ): ?>
		<section class="pb-block full-width pb-hero-service pb-hero-blog pb-block-with-background" style="background-image:url(<?php echo get_the_post_thumbnail_url( $featured_post, 'full' ); ?>);">
			<div class="container container-small">
				<div class="pb-hero-service__intro">
					<div class="pb-hero-service__intro-text">
						<h1 class="heading-with-separator"><?php echo get_the_title( $featured_post ); ?></h1>
						<p><?php echo get_the_excerpt( $featured_post ); ?></p>
						<div class="pb-button-wrap"><a href="<?php echo get_permalink( $featured_post ); ?>" class="button">Read Story</a></div>
					</div>
				</div>
			</div>

			<div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/blog.svg" alt=""></div>
		</section>
	<?php endif; ?>

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
									<div class="pb-button-wrap"><a href="<?php echo get_permalink(); ?>" class="button">Read Story</a></div>
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
