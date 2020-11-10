<?php
$heading = get_sub_field( 'heading' );
if( empty( $heading ) ){
    $heading = get_field( 'footer_articles_heading', 'option' );
}

$subheading = get_sub_field( 'subheading' );
if( empty( $subheading ) ){
    $subheading = get_field( 'footer_articles_subheading', 'option' );
}

$args = array(  
    'post_type'         => 'post',
    'post_status'       => 'publish',
    'posts_per_page'    => 3, 
);
$articles_query = new WP_Query( $args ); 

$class = array(
    'pb-block', 
    'full-width', 
    'pb-articles', 
);
?>
<section class="<?php echo implode( ' ', $class ); ?>">
    <div class="container">
        <div class="pb-articles__intro">
            <div class="pb-articles__intro-text">
                <h3 class="heading-with-separator-grad"><?php echo $heading; ?></h3>
                <p><?php echo $subheading; ?></p>
            </div>
        </div>

        <div class="pb-articles__items">
            <?php $index = 1; while ( $articles_query->have_posts() ) : $articles_query->the_post(); $category = get_the_category(); ?>
                <div class="pb-articles__item">
                    <div class="pb-articles__item-image"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'articles-thumb' ); ?></a></div>
                    <div class="pb-articles__item-content">
                        <span><a href="<?php echo get_term_link( $category[0]->term_id ); ?>"><?php echo $category[0]->name; ?></a></span>
                        <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
                        <a href="<?php echo get_permalink(); ?>" class="button">Read Story</a>
                    </div>
                </div>
            <?php $index++; endwhile; ?>
            <?php wp_reset_postdata();  ?>
        </div>

        <div class="pb-articles__btn">
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="pb-button">Explore All Articles</a>
        </div>
    </div>
</section>