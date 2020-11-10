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
		<?php while ( have_posts() ) : the_post(); ?>

            <section class="pb-block full-width pb-hero-work-single pb-block-with-background" style="background-image:url(<?php echo get_field( 'hero_background' ); ?>);">
                <div class="container container-small"> 
                    <div class="pb-hero-work-single__intro">
                        <div class="pb-hero-work-single__intro-text">
                            <h1 class="heading-with-separator"><?php echo get_the_title(); ?></h1>
                            <p><?php echo get_the_content(); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="container container-narrow">
                    <div class="pb-hero-work-single__image"><?php echo get_the_post_thumbnail(); ?></div>

                <?php $challenge = get_field( 'challenge' ); ?>
                <?php if( $challenge ): ?>
                    <div class="pb-hero-work-single__challenge">
                        <h5>The Challenge</h5>
                        <?php echo get_field( 'challenge' ); ?>
                    </div>
                <?php endif; ?>
                
                </div>

                <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/work-single.svg" alt=""></div>
            </section>

			<?php dbrain_display_pb_blocks(); ?>
		<?php endwhile; ?>
	</main><!-- #main -->
	<aside class="before-footer" <?php echo dbrain_footer_background(); ?>>
		<?php dbrain_display_global_footer_blocks(); ?>
	</aside>
<?php get_footer();