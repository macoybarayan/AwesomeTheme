<?php
/**
 * AwesomeTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AwesomeTheme
 */

if ( ! function_exists( 'awesome_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function awesome_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AwesomeTheme, use a find and replace
		 * to change 'awesome_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'awesome_theme', get_template_directory() . '/languages' );

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
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'awesome_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'awesome_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'awesome_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function awesome_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'awesome_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'awesome_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function awesome_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'awesome_theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'awesome_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'awesome_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function awesome_theme_scripts() {
	wp_enqueue_style( 'awesome_theme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'awesome_theme-main-style', get_template_directory_uri() . '/assets/css/main.css' );

	wp_enqueue_style( 'awesome_theme-fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );

	wp_enqueue_script( 'awesome_theme-jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '20151215', true );

	wp_enqueue_script( 'awesome_theme-sticky_js', get_template_directory_uri() . '/assets/js/jquery.sticky.js', array("jquery"), '20151215', true );

	//FOUNDATION
	wp_enqueue_script( 'awesome_theme-foundation_js', get_template_directory_uri() . '/assets/js/foundation.min.js', array(), '20151215', true );
	wp_enqueue_style( 'awesome_theme-foundation_style', get_template_directory_uri() . '/assets/css/foundation.min.css' );

	//LIGHSLIDER
	wp_enqueue_script( 'awesome_theme-lightslider_js', get_template_directory_uri() . '/inc/lightslider/js/lightslider.min.js', array(), '20151215', true );
	wp_enqueue_style( 'awesome_theme-lightslider_style', get_template_directory_uri() . '/inc/lightslider/css/lightslider.min.css' );

	//MODAL
	wp_enqueue_script( 'awesome_theme-modal_js', get_template_directory_uri() . '/assets/js/custombox.min.js', array('jquery'), '20151215', true );
	wp_enqueue_style( 'awesome_theme-modal_style', get_template_directory_uri() . '/assets/css/custombox.min.css' );

	
	wp_enqueue_script( 'awesome_theme-main_js', get_template_directory_uri() . '/assets/js/main.js', array("jquery"), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'awesome_theme_scripts', 99 );

function admin_scripts($hook) {
    //angularjs
	wp_enqueue_script( 'angular_js', get_template_directory_uri() . '/assets/js/angular.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'main_controller', get_template_directory_uri() . '/assets/angular/mainController.js', array('jquery'), '20151215', true );
}
add_action('admin_enqueue_scripts', 'admin_scripts');

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

// require get_template_directory() . '/inc/cmb2/metabox.php';

require get_template_directory() . '/admin/index.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Register the Slider post type.
 *
 * @see register_post_type()
 */
// function awt_create_post_type() {
//     register_post_type( 'testimonial',
//         array(
//             'labels' => array(
//                 'name'          => __( 'Homepage Slider', 'textdomain' ),
//                 'singular_name' => __( 'Homepage Slider', 'textdomain' )
//             ),
//             'public'      => true,
//             'has_archive' => true,
//             'menu_icon'   => 'dashicons-format-gallery',
//         )
//     );
// }
// add_action( 'init', 'awt_create_post_type', 0 );

add_action( 'admin_menu', 'add_user_data_management' );
function add_user_data_management() {
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 'Data Management', 'Data Management', 'manage_options', 'data-management', 'wps_theme_func', 'dashicons-welcome-widgets-menus', 90 );
}

function wps_theme_func(){
	echo '<div class="wrap" ng-app="myApp" ng-controller="MainController"><div id="icon-options-general" class="icon32"><br></div>
	<h2>Data Management</h2></div>';
}