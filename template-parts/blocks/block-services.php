<?php
$services = get_sub_field( 'services' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-services', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container container-small">
    <?php if( $services ): ?>
        <div class="pb-services__wrap">
        <?php foreach( $services as $service ): ?>
            <div class="pb-services__item">
                <div class="pb-services__item-inner" data-href="<?php echo get_permalink( $service['page'] ); ?>">
                    <div class="pb-services__item-image">
                        <img src="<?php echo $service['icon']['url']; ?>" alt="<?php echo $service['title']; ?>" width="72" height="72">
                    </div>
                    <div class="pb-services__item-desc">
                        <h3><?php echo $service['title']; ?></h3>
                        <p><?php echo $service['description']; ?></p>
                    </div>
                    <div class="pb-services__item-btn">
                        <a href="<?php echo get_permalink( $service['page'] ); ?>">Learn More</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div>
</section>