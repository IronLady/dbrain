<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package DigitalBrain
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dbrain_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'dbrain_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function dbrain_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'dbrain_pingback_header' );

function dbrain_display_pb_blocks(){
	$blocks = array(
		'hero_home',
		'hero_service',
		'hero_work',
		'projects_slider', 
		'projects_grid', 
		'images_grid', 
		'articles', 
		'services', 
		'testimonials', 
		'text', 
		'case_study', 
		'image_slider', 
		'contact'
	);

	if( have_rows('page_blocks') ):
		while ( have_rows('page_blocks') ) : the_row();
			$layout = get_row_layout();

			if( in_array( get_row_layout(), $blocks ) ){
				get_template_part( 'template-parts/blocks/block', $layout );
			}
		endwhile;
	endif;
}

function dbrain_display_footer_blocks(){
	$blocks = array(
		'articles', 
		'services_link', 
		'images_grid',
		'cta'
	);

	if( get_field( 'custom_footer' ) ):
		if( have_rows('footer_blocks') ):
			while ( have_rows('footer_blocks') ) : the_row();
				$layout = get_row_layout();
	
				if( in_array( get_row_layout(), $blocks ) ){
					get_template_part( 'template-parts/blocks/block', $layout );
				}
			endwhile;
		endif;
	else:
		if( have_rows('footer_blocks', 'option') ):
			while ( have_rows('footer_blocks', 'option') ) : the_row();
				$layout = get_row_layout();
	
				if( in_array( get_row_layout(), $blocks ) ){
					get_template_part( 'template-parts/blocks/block', $layout );
				}
			endwhile;
		endif;
	endif;
}

function dbrain_get_header_style(){
	$style = get_field( 'header_style' );
	if( empty( $style ) ){
		$style = 'default';
	}

	return sprintf( 'header-' . $style );
}

function dbrain_display_global_footer_blocks(){
	$blocks = array(
		'articles', 
		'services_link',
		'images_grid', 
		'cta'
	);

	if( have_rows('footer_blocks', 'option') ):
		while ( have_rows('footer_blocks', 'option') ) : the_row();
			$layout = get_row_layout();

			if( in_array( get_row_layout(), $blocks ) ){
				get_template_part( 'template-parts/blocks/block', $layout );
			}
		endwhile;
	endif;
}

function dbrain_footer_background(){
	$background = get_field( 'background' );
	if( $background['type'] == 'color' ){
		return 'style="background-color:' . $background['color'] . '"';
	}elseif( $background['type'] == 'image' ){
		return 'style="background-image:url(' . $background['image'] . ');background-size:cover;background-position:top center;"';
	}

	return;
}

function dbrain_footer_class(){
	$background = get_field( 'background' );
	if( $background['type'] == 'color' ){
		return 'before-footer__color';
	}elseif( $background['type'] == 'image' ){
		return 'before-footer__image';
	}else{
		return 'before-footer__default';
	}

	return;
}

function dbrain_lead_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'text' => 'Lead In Here',
		),
		$atts
	);

	return '<div class="lead-text">' . $atts['text'] . '</div>';
}
add_shortcode( 'dbrain_lead', 'dbrain_lead_shortcode' );

add_action( 'wp_ajax_get_projects', 'dbrain_get_projects_ajax' );
add_action( 'wp_ajax_nopriv_get_projects', 'dbrain_get_projects_ajax' );
function dbrain_get_projects_ajax(){
	$page = $_POST['page'];		
	$exclude = $_POST['exclude'];
	
	$args = array(  
		'post_type'         => 'project',
		'post_status'       => 'publish',
		'paged'             => $page
	);

	if( !empty( $exclude ) ){
		$args['post__not_in'] = explode(',', $exclude);
	}
	$project_query = new WP_Query( $args ); 
	ob_start();
	if( $project_query->have_posts() ): ?>
		<div class="ajax-response">
			<div class="items">
				<?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>
					<div class="projects-grid__item">
						<div class="projects-grid__holder">
							<div class="projects-grid__inner">
								<div class="projects-grid__content">
									<div class="projects-grid__content-heading">
										<h3><?php echo get_the_title(); ?></h3>
										<h5><?php echo get_field( 'short_desc' ); ?></h5>
										<p><?php echo get_the_content(); ?></p>
										<a href="<?php echo get_permalink(); ?>">View Project</a>
									</div>
									<div class="projects-grid__content-image">
										<img src="<?php echo get_field( 'main_image' )['url']; ?>" alt="<?php echo get_the_title(); ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php if( $project_query->max_num_pages > $page ): ?>
				<div class="nav"><a href="#" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>?action=get_projects" data-page="<?php echo ($page + 1); ?>" data-exclude="<?php echo implode(',', $exclude); ?>" class="project-btn pb-button">See More</a></div>
			<?php endif; ?>	
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata();  ?>
	
	<?php 
	echo ob_get_clean();
	wp_die();
}

add_filter( 'body_class', 'dbrain_add_slug_body_class' );
function dbrain_add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = 'dbrain-' . $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}

function dbrain_excerpt_length($length){
	return 30;
}
add_filter('excerpt_length', 'dbrain_excerpt_length');	

function dbrain_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'dbrain_excerpt_more');