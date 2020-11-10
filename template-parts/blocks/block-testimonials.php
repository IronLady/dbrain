<?php
$author = get_sub_field( 'author' );
$company = get_sub_field( 'company' );
$content = get_sub_field( 'content' );

$class = array(
    'pb-block', 
    'full-width', 
    'pb-testimonials', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container">
        <div class="pb-testimonials__wrap">
            <div class="pb-testimonials__before"><span><img src="<?php echo get_template_directory_uri(); ?>/images/quote.svg" alt=""></span></div>
            <div class=pb-testimonials__inner">
                <div class="pb-testimonials__content"><?php echo $content; ?></div>
                <div class="pb-testimonials__author"><?php printf( '<span>%s |</span> %s', $author, $company ); ?></div>
            </div>
            <div class="pb-testimonials__after"><span><img src="<?php echo get_template_directory_uri(); ?>/images/quote-r.svg" alt=""></span></div>
        </div>
    </div>
</section>