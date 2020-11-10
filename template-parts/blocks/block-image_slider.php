<?php
$images = get_sub_field( 'images' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-image-slider', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container">
        <div class="pb-image-slider__wrap">
            <?php if( $images ): ?>
                <div class="pb-image-slider__nav">
                    <button type="button" class="pb-image-slider__prev">Prev</button>
                    <button type="button" class="pb-image-slider__next">Next</button>
                </div>
                <div class="pb-image-slider__items force-fullwidth">
                    <?php foreach( $images as $image ): ?>
                        <div class="pb-image-slider__item">
                            <figure class="wp-caption aligncenter">
                                <?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
                                <figcaption class="wp-caption-text">
                                    <?php echo $image['caption']; ?>
                                </figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>