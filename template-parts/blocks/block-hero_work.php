<?php
$background_image = get_sub_field( 'background_image' );
$heading = get_sub_field( 'heading' );
$subheading = get_sub_field( 'subheading' );
$project = get_sub_field( 'featured_project' );
$separator = get_sub_field( 'separator' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-hero-work', 
    'pb-block-with-background'
);
?>
<section class="<?php echo implode( ' ', $class ); ?>" style="background-image:url(<?php echo $background_image['url']; ?>);">
    <div class="pb-hero-work__intro">
        <div class="pb-hero-work__intro-text">
            <h1 class="heading-with-separator sep-<?php echo $separator; ?>"><?php echo $heading; ?></h1>
            <p><?php echo $subheading; ?></p>
        </div>
    </div>
    
    <div class="container container-narrow">
        <div class="pb-hero-work__featured" data-href="<?php echo get_permalink( $project ); ?>">
            <div class="pb-hero-work__project">
                <div class="pb-hero-work__project-heading">
                    <div class="pb-hero-work__project-heading-left">
                        <h3><?php echo get_the_title( $project ); ?></h3>
                        <h5><?php echo get_field( 'short_desc', $project ); ?></h5>
                    </div>
                    <div class="pb-hero-work__project-heading-right">
                        <a href="<?php echo get_permalink( $project ); ?>">View Project</a>
                    </div>
                </div>
                <div class="pb-hero-work__project-image">
                    <img src="<?php echo get_field( 'main_image', $project )['url']; ?>" alt="<?php echo get_the_title( $project ); ?>">
                </div>
            </div>
        </div>
    </div>

    <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/work.svg" alt=""></div>
</section>