<?php
$args = array(  
    'post_type'         => 'project',
    'post_status'       => 'publish',
    'posts_per_page'    => 8, 
);

$project_query = new WP_Query( $args ); 
$class = array(
    'pb-block', 
    'full-width', 
    'pb-projects-slider', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container">
        <div class="projects-slider__wrap force-fullwidth">
            <?php $index = 1; while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
                <div class="projects-slider__item">
                    <div class="projects-slider__holder">
                        <div class="projects-slider__inner" data-href="<?php echo get_permalink(); ?>">
                            <div class="projects-slider__content">
                                <div class="projects-slider__content-heading">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <h5><?php echo get_field( 'short_desc' ); ?></h5>
                                    <a href="<?php echo get_permalink(); ?>">View Project</a>
                                </div>
                                <div class="projects-slider__content-image">
                                    <img src="<?php echo get_field( 'main_image' )['url']; ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="projects-slider__number"><span><?php printf( '%02d', $index ); ?></span></div>
                    </div>
                </div>
            <?php $index++; endwhile; ?>
            <?php wp_reset_postdata();  ?>
        </div>
        <div class="projects-slider__btn">
            <a href="<?php echo get_post_type_archive_link( 'project' ); ?>" class="pb-button">Explore All Projects</a>
        </div>
    </div>
</section>