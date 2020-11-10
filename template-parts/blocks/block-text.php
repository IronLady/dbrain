<?php
$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' );
$type = get_sub_field( 'type' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-text', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container container-small">
    <?php if( $type == 'column' ): ?>
        <div class="pb-text__wrap">
            <?php if( $heading ): ?>
                <div class="pb-text__heading"><?php echo $heading; ?></div>
            <?php endif; ?>
            <div class="pb-text__content"><?php echo $content; ?></div>
        </div>
    <?php else: ?>
        <div class="pb-text__content-full"><?php echo $content; ?></div>
    <?php endif; ?>
    </div>
</section>