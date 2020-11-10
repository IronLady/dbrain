<?php
$exclude = get_sub_field('exclude');
$args = array(  
    'post_type'         => 'project',
    'post_status'       => 'publish',
    'paged'             => 1
);

if( !empty( $exclude ) ){
    $args['post__not_in'] = $exclude;
}

$project_query = new WP_Query( $args ); 
$class = array(
    'pb-block', 
    'full-width', 
    'pb-projects-grid', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container">
        <div class="projects-grid__wrap">
            <?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
                <div class="projects-grid__item">
                    <div class="projects-grid__holder">
                        <div class="projects-grid__inner" data-href="<?php echo get_permalink(); ?>">
                            <div class="projects-grid__content">
                                <div class="projects-grid__content-heading">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <h5><?php echo get_field( 'short_desc' ); ?></h5>
                                    <p><?php echo get_the_content(); ?></p>
                                    <a href="<?php echo get_permalink(); ?>">View Project</a>
                                </div>
                                <div class="projects-grid__content-image">
                                    <img src="<?php echo get_field( 'main_image' )['url']; ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata();  ?>
        </div>
        <div class="projects-grid__btn">
            <a href="#" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=get_projects" data-page="2" data-exclude="<?php echo implode(',', $exclude); ?>" class="project-btn pb-button">See More</a>
        </div>
    </div>
</section>