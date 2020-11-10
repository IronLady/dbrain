<?php
$project = get_sub_field( 'project' );
$class = array(
    'pb-block', 
    'full-width', 
    'pb-case_study', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container container-small">
        <div class="pb-case_study__wrap">
            <div class="pb-case_study__item">
                <div class="pb-case_study__holder">
                    <div class="pb-case_study__inner">
                        <div class="pb-case_study__content">
                            <div class="pb-case_study__content-heading">
                                <h3><?php echo get_the_title( $project->ID ); ?></h3>
                                <h5><?php echo get_field( 'short_desc', $project->ID ); ?></h5>
                                <a href="<?php echo get_permalink( $project->ID ); ?>">View Project</a>
                            </div>
                        </div>
                        <div class="pb-case_study__content-image">
                            <img src="<?php echo get_field( 'main_image', $project->ID )['sizes']['medium_large']; ?>" alt="<?php echo get_the_title( $project->ID ); ?>">
                        </div>
                    </div>
                    <div class="pb-case_study__content-image-mobile">
                        <img src="<?php echo get_field( 'main_image', $project->ID )['sizes']['medium_large']; ?>" alt="<?php echo get_the_title( $project->ID ); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>