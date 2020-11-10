<?php
global $post;

$background_image = get_sub_field( 'background_image' );
$heading = get_sub_field( 'heading' );
$subheading = get_sub_field( 'subheading' );
$image = get_sub_field( 'image' );
$mobile_image = get_sub_field( 'mobile_image' );
$separator = get_sub_field( 'separator' );

$parent = get_post_ancestors( $post );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-hero-service', 
    'pb-block-with-background'
);

if( $parent ){
    $class[] = 'pb-hero-service-single';
}
?>
<section class="<?php echo implode( ' ', $class ); ?>" style="background-image:url(<?php echo $background_image['url']; ?>);">
    <div class="container container-small">
        <div class="pb-hero-service__intro">
            <div class="pb-hero-service__intro-text">
                <h1 class="heading-with-separator sep-<?php echo $separator; ?>"><?php echo $heading; ?></h1>
                <p><?php echo $subheading; ?></p>
            </div>
            <div class="pb-hero-service__intro-image">
                <img src="<?php echo $image['url']; ?>" alt="">
            </div>
            <div class="pb-hero-service__intro-mobile-image">
                <?php if( $mobile_image ): ?>
                    <img src="<?php echo $mobile_image['url']; ?>" alt="">
                <?php else: ?>
                    <img src="<?php echo $image['url']; ?>" alt="">
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php if( $parent ): ?>
    <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/service-single.svg" alt=""></div>
<?php else: ?>
    <?php if( $post->post_name === 'company' ): ?>
        <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/company.svg" alt=""></div>
    <?php else: ?>
        <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/service.svg" alt=""></div>
    <?php endif; ?>
<?php endif; ?>
</section>