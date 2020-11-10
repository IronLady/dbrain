<?php 
$image = get_sub_field( 'image' );
$heading = get_sub_field( 'heading' );
$email = get_sub_field( 'email' );
$phone = get_sub_field( 'phone' );
$subheading = get_sub_field( 'subheading' );
$form = get_sub_field( 'contact_form' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-contact', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="pb-contact__mini-hero" style="background-image:url(<?php echo $image; ?>);">
        <div class="hero-curve"><img src="<?php echo get_template_directory_uri(); ?>/images/curve/contact.svg" alt=""></div>
    </div>
    <div class="container container-narrow">
        <div class="pb-contact__wrap">
            <div class="pb-contact__left">
                <span></span>
                <h3><?php echo $heading; ?></h3>
                <div class="pb-contact__detail">
                    <a href="mailto:<?php echo $emai; ?>"><?php echo $email; ?></a> | <a href=tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
                </div>
                <p><?php echo $subheading; ?></p>
            </div>
            <div class="pb-contact__right">
                <?php echo do_shortcode( $form ); ?>
            </div>
        </div>
    </div>
</section>