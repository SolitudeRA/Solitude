<?php
/**
 * Solitude functions and definitions
 *
 * @link
 *
 * @package Solitude
 * @since 1.0
 */


/**
 * Solitude only works in WordPress 5.2 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.2', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';

	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function solitude_setup() {
	/*
    * Make theme available for translation.
    */
	load_theme_textdomain( 'solitude' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( "html5", array(
		"search-form",
		"comment-form",
		"comment-list",
		"gallery",
		"caption"
	) );

	// Add theme support for Custom Logo.
	add_theme_support( "custom-logo", array(
		"width"       => 250,
		"height"      => 250,
		"flex-height" => true,
		"flex-width"  => true
	) );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( "post-formats", array(
		"aside",
		"audio",
		"video",
		"image",
		"gallery",
		"link",
		"quote",
		"status"
	) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus(
		array(
			'top'     => __( 'Top Menu', 'solitude' ),
			'sidebar' => __( 'Sidebar Menu,"solitude' ),
			'social'  => __( 'Social Links Menu', 'solitude' )
		)
	);

	add_theme_support( "custom-background", array(
		"default-image"          => "",
		"default-preset"         => "default",
		"default-position-x"     => "left",
		"default-position-y"     => "top",
		"default-size"           => "auto",
		"default-repeat"         => "repeat",
		"default-attachment"     => "scroll",
		"default-color"          => "",
		"wp-head-callback"       => "_custom_background_cb",
		"admin-head-callback"    => "",
		"admin-preview-callback" => ""
	) );

	add_theme_support( "post-thumbnails" );

	//Add post thumbnails sizes
	add_image_size( "wqhd-size", 2560, 1440 );
	add_image_size( "fhd-size", 1920, 1080 );
	add_image_size( "hd-size", 1280, 720 );
	add_image_size( "avatar-large-size", 500, 500 );
	add_image_size( "avatar-medium-size", 250, 250 );
	add_image_size( "avatar-small-size", 125, 125 );

	//Loads the theme's translated strings
	load_theme_textdomain( "solitude-domain", get_template_directory() . "/languages" );
}

add_action( "after_setup_theme", "solitude_setup" );

function solitude_widgets_init() {
	register_sidebar( array(
		"name"          => __( "Sidebar left", "solitude-domain" ),
		"id"            => "sidebar-left",
		"description"   => __( "Add widgets here to appear in your left sidebar.", "solitude-domain" ),
		"class"         => "",
		"before_widget" => "<li class='widget'>",
		"after_widget"  => "</li>",
		"before_title"  => "<h2 class='sidebar-widget-title'>",
		"after_title"   => "</h2>"
	) );

	register_sidebar( array(
		"name"          => __( "Sidebar right", "solitude-domain" ),
		"id"            => "sidebar-right",
		"description"   => __( "Add widgets here to appear in your right sidebar.", "solitude-domain" ),
		"class"         => "",
		"before_widget" => "<li class='widget'>",
		"after_widget"  => "</li>",
		"before_title"  => "<h2 class='sidebar-widget-title'>",
		"after_title"   => "</h2>"
	) );

	register_sidebar( array(
		"name"          => __( "Sidebar header", "solitude-domain" ),
		"id"            => "sidebar-header",
		"description"   => __( "Add widgets here to appear in your header.", "solitude-domain" ),
		"class"         => "",
		"before_widget" => "<li class='widget'>",
		"after_widget"  => "</li>",
		"before_title"  => "<h2 class='solitude-widget-title'>",
		"after_title"   => "</h2>"
	) );

	register_sidebar( array(
		"name"          => __( "Sidebar footer", "solitude-domain" ),
		"id"            => "sidebar-footer",
		"description"   => __( "Add widgets here to appear in your footer.", "solitude-domain" ),
		"class"         => "",
		"before_widget" => "<li class='widget'>",
		"after_widget"  => "</li>",
		"before_title"  => "<h2 class='solitude-widget-title'>",
		"after_title"   => "</h2>"
	) );
}

add_action( "widgets_init", "solitude_widgets_init" );

function solitude_customize_register( $wp_customize ) {
	$wp_customize->add_section( "color_theme_section", array(
		'title' => __( 'Color theme', "solitude-domain" )
	) );
}

add_action( "customise_register", "solitude_customise_register" );

/**
 * Enqueues scripts and styles.
 */
function solitude_scripts() {
	if ( 'light' === get_theme_mod( 'color_scheme', 'dark' ) ) {
		wp_enqueue_style( "solitude-theme-light", "" );
	}
	wp_enqueue_style( "solitude-fonts-zh", "fonts.googleapis.com/earlyaccess/notosanssc.css" );
	wp_enqueue_style( "solitude-fonts-zh-sliced", "fonts.googleapis.com/earlyaccess/notosansscsliced.css" );
	wp_enqueue_style( "solitude-fonts-jp", "fonts.googleapis.com/earlyaccess/notosansjp.css" );
	wp_enqueue_style( "solitude-fonts-en", "fonts.googleapis.com/css?family=Roboto:300,400,500,700" );
	wp_enqueue_style( "font-awesome", "assets/engine/font-awesome/css/font-awesome.min.css" );
	wp_enqueue_style( "solitude-style", get_stylesheet_uri() );
	wp_enqueue_script( "jQuery", "assets/engine/jQuery/jquery-3.2.1.min.js", "jQuery", "3.2.1", true );
	wp_enqueue_script( "solitude-global", "assets/js/solitude-global.js", "Global-Script", "1.0.0", true );
}

add_action( "wp_enqueue_scripts", "solitude_scripts" );