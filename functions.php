<?php
/**
 * DigitalBrain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DigitalBrain
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dbrain_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dbrain_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DigitalBrain, use a find and replace
		 * to change 'dbrain' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dbrain', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'dbrain' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'dbrain_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_image_size( 'articles-thumb', 430, 430, true );
		add_image_size( 'articles-hero', 544, 544, true );
	}
endif;
add_action( 'after_setup_theme', 'dbrain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dbrain_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dbrain_content_width', 640 );
}
add_action( 'after_setup_theme', 'dbrain_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dbrain_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dbrain' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dbrain' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dbrain_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dbrain_scripts() {
	wp_enqueue_style( 'dbrain-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dbrain-style', 'rtl', 'replace' );

	wp_enqueue_style( 'google-muli', 'https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,400;0,600;0,800;1,400;1,600&display=swap', array(), _S_VERSION );
	wp_enqueue_style( 'slick-slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );

	wp_enqueue_script( 'dbrain-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1', true );
	wp_enqueue_script( 'dbrain-script', get_template_directory_uri() . '/js/custom.min.js', array( 'jquery' ), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dbrain_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register Custom Post Type
function project_post_type() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'dbrain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'dbrain' ),
		'menu_name'             => __( 'Projects', 'dbrain' ),
		'name_admin_bar'        => __( 'Project', 'dbrain' ),
		'archives'              => __( 'Item Archives', 'dbrain' ),
		'attributes'            => __( 'Item Attributes', 'dbrain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'dbrain' ),
		'all_items'             => __( 'All Items', 'dbrain' ),
		'add_new_item'          => __( 'Add New Item', 'dbrain' ),
		'add_new'               => __( 'Add New', 'dbrain' ),
		'new_item'              => __( 'New Item', 'dbrain' ),
		'edit_item'             => __( 'Edit Item', 'dbrain' ),
		'update_item'           => __( 'Update Item', 'dbrain' ),
		'view_item'             => __( 'View Item', 'dbrain' ),
		'view_items'            => __( 'View Items', 'dbrain' ),
		'search_items'          => __( 'Search Item', 'dbrain' ),
		'not_found'             => __( 'Not found', 'dbrain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dbrain' ),
		'featured_image'        => __( 'Featured Image', 'dbrain' ),
		'set_featured_image'    => __( 'Set featured image', 'dbrain' ),
		'remove_featured_image' => __( 'Remove featured image', 'dbrain' ),
		'use_featured_image'    => __( 'Use as featured image', 'dbrain' ),
		'insert_into_item'      => __( 'Insert into item', 'dbrain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'dbrain' ),
		'items_list'            => __( 'Items list', 'dbrain' ),
		'items_list_navigation' => __( 'Items list navigation', 'dbrain' ),
		'filter_items_list'     => __( 'Filter items list', 'dbrain' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'dbrain' ),
		'description'           => __( 'DigitalBrain Projects', 'dbrain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'rewrite' 				=> array(
			'slug' 			=> 'work',
			'with_front' 	=> false
		),
	);
	register_post_type( 'project', $args );

}
add_action( 'init', 'project_post_type', 0 );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_pages',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-settings',
	));
}