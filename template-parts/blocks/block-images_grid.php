<?php
$heading = get_sub_field( 'heading' );
$subheading = get_sub_field( 'subheading' );
$images = get_sub_field( 'images' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-images-grid', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container container-narrow">
        <div class="pb-images-grid__intro">
            <div class="pb-images-grid__intro-text">
                <h3 class="heading-with-separator-grad"><?php echo $heading; ?></h3>
                <p><?php echo $subheading; ?></p>
            </div>
        </div>

        <div class="pb-images-grid__content">
            <div class="pb-images-grid__content-images">
            <?php if( $images ): ?>
                <?php foreach( $images as $image ): ?>
                    <div class="content-images__item">
                        <img src="<?php echo $image['url']; ?>" alt="">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>