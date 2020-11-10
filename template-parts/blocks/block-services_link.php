<?php
$services = get_field( 'services', 'option' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-services-link', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container container-narrow">
    <?php if( $services ): ?>
        <div class="pb-services-link__wrap">
        <?php foreach( $services as $service ): ?>
            <div class="pb-services-link__inner">
                <?php if( get_the_ID() == $service['page'] ): ?>
                    <div class="pb-services-link__item current">
                        <div class="pb-services-link__item-image">
                            <img src="<?php echo $service['icon']['url']; ?>" alt="<?php echo $service['name']; ?>" width="72" height="72">
                        </div>
                        <div class="pb-services-link__item-desc">
                            <h5><?php echo $service['name']; ?></h5>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?php echo get_permalink( $service['page'] ); ?>">
                        <div class="pb-services-link__item">
                            <div class="pb-services-link__item-image">
                                <img src="<?php echo $service['icon']['url']; ?>" alt="<?php echo $service['name']; ?>" width="72" height="72">
                            </div>
                            <div class="pb-services-link__item-desc">
                                <h5><?php echo $service['name']; ?></h5>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>
    </div>
</section>