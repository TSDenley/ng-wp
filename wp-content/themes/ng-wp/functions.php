<?php
/**
 * ng-wp functions and definitions
 *
 * @package ng-wp
 */

define('THEME_DIR_URI', get_stylesheet_directory_uri());


if ( ! function_exists( 'ng_wp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ng_wp_setup() {

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ng-wp' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
}
endif; // ng_wp_setup
add_action( 'after_setup_theme', 'ng_wp_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
// function ng_wp_widgets_init() {
// 	register_sidebar( array(
// 		'name'          => esc_html__( 'Sidebar', 'ng-wp' ),
// 		'id'            => 'sidebar-1',
// 		'description'   => '',
// 		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
// 		'after_widget'  => '</aside>',
// 		'before_title'  => '<h1 class="widget-title">',
// 		'after_title'   => '</h1>',
// 	) );
// }
// add_action( 'widgets_init', 'ng_wp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ng_wp_scripts() {
	wp_enqueue_style( 'ng-wp-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ng-wp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script(
			'angularjs',
			THEME_DIR_URI . '/bower_components/angular/angular.js'
		);

	wp_enqueue_script(
		'angularjs-route',
		THEME_DIR_URI . '/bower_components/angular-route/angular-route.js',
		array( 'angularjs' )
	);

	wp_enqueue_script(
		'my-scripts',
		THEME_DIR_URI . '/js/scripts.js',
		array( 'angularjs', 'angularjs-route' ),
		'20150526',
		true
	);

	wp_localize_script(
		'my-scripts',
		'appVars',
		array(
			'siteURL' => esc_url( home_url('/') ),
			'partials' => THEME_DIR_URI . '/partials'
			)
	);
}
add_action( 'wp_enqueue_scripts', 'ng_wp_scripts' );
