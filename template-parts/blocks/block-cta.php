<?php 
global $post;

$style = get_sub_field( 'style' );
$use_custom_bg = get_sub_field( 'use_custom_background' );
$background = get_sub_field( 'background' );

$parent = get_post_ancestors( $post );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-cta', 
    'pb-block-with-background', 
    'pb-cta-' . $style
);
?>
<section class="<?php echo implode( ' ', $class ); ?>" <?php echo ( $use_custom_bg ? 'style="background-image:url(' . $background . ');"' : '' ); ?>>
<?php if( $style == 'short' ): ?>
    <div class="container container-narrow">
        <div class="pb-cta__wrap">
            <div class="pb-cta__left">
                <span></span>
                <h3><?php echo get_field( 'footer_heading', 'option' ); ?></h3>
            </div>
            <div class="pb-cta__right">
                <a href="<?php echo get_field( 'footer_url', 'option' ); ?>">Get In Touch</a>
            </div>
        </div>
    </div>
<?php elseif( $style == 'contact' ): ?>
    <div class="container container-narrow">
        <div class="pb-cta__wrap pb-cta__contact">
            <div class="pb-cta__left">
                <span></span>
                <h3><?php echo get_field( 'footer_heading', 'option' ); ?></h3>
            </div>
            <div class="pb-cta__right">
                <?php echo do_shortcode( get_field( 'footer_contact_form', 'option' ) ); ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="pb-cta__inner">
        <span></span>
        <h3><?php echo get_field( 'footer_heading', 'option' ); ?></h3>
        <a href="<?php echo get_field( 'footer_url', 'option' ); ?>">Get In Touch</a>
    </div>
<?php endif; ?>

<?php if( $parent ): ?>
    <div class="footer-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/cta-grey.svg" alt=""></div>
<?php else: ?>
    <div class="footer-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/cta.svg" alt=""></div>
<?php endif; ?>
</section>