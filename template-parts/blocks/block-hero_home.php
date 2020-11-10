<?php
$background_image = get_sub_field( 'background_image' );
$heading = get_sub_field( 'heading' );
$subheading = get_sub_field( 'subheading' );
$image = get_sub_field( 'image' );
$content_heading = get_sub_field( 'content_heading' );
$content_subheading = get_sub_field( 'content_subheading' );
$button = get_sub_field( 'button' );
$services = get_sub_field( 'services' );
$separator = get_sub_field( 'separator' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-hero-home', 
    'pb-block-with-background'
);
?>
<section class="<?php echo implode( ' ', $class ); ?>" style="background-image:url(<?php echo $background_image['url']; ?>);">
    <div class="container container-small">
        <div class="pb-hero-home__intro">
            <div class="pb-hero-home__intro-text">
                <h1 class="heading-with-separator sep-<?php echo $separator; ?>"><?php echo $heading; ?></h1>
                <p><?php echo $subheading; ?></p>
            </div>
            <div class="pb-hero-home__intro-image">
                <img src="<?php echo $image['url']; ?>" alt="">
            </div>
        </div>
    </div>

    <div class="container">
        <div class="pb-hero-home__content">
            <div class="pb-hero-home__content-text">
                <h2><?php echo $content_heading; ?></h2>
                <p><?php echo $content_subheading; ?></p>
                <div class="pb-button-wrap"><a href="<?php echo esc_url( $button['url'] ); ?>" class="pb-button"><?php echo $button['title']; ?></a></div>
            </div>
            <div class="pb-hero-home__content-services">
            <?php if( $services ) : ?>
                <ul>
                    <?php foreach( $services as $service ) : ?>
                        <li>
                            <div class="content-services__item">
                                <div class="content-services__item-image">
                                    <img src="<?php echo $service['icon']['url']; ?>" alt="<?php echo $service['title']; ?>">
                                </div>
                                <div class="content-services__item-desc">
                                    <h3><?php echo $service['title']; ?></h3>
                                    <p><?php echo $service['description']; ?></p>
                                </div>
                                <div class="content-services__item-btn">
                                    <a href="<?php echo esc_url( $service['url'] ); ?>"></a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/home.svg" alt=""></div>
</section>