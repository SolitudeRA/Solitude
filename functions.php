<?php
/**
 * Solitude functions and definitions
 *
 * @package Solitude
 * @since 1.0
 */

/**
 * Solitude only works in WordPress 5.2 or later.
 */
if (version_compare($GLOBALS['wp_version'], '5.2', '<')) {
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
if (!function_exists('solitude_setup')) : function solitude_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('solitude', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support('automatic-feed-links');

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support("html5", array(
        "search-form",
        "comment-form",
        "comment-list",
        "gallery",
        "caption"
    ));

    // Add theme support for Custom Logo.
    add_theme_support("custom-logo", array(
        "width" => 250,
        "height" => 250,
        "flex-height" => true,
        "flex-width" => true
    ));

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support('post-thumbnails');

    /*
    * 开启post格式支持
    */
    add_theme_support("post-formats", array(
        "aside",
        "audio",
        "video",
        "image",
        "gallery",
        "link",
        "quote",
        "status"
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    add_theme_support("custom-background", array(
        "default-image" => "",
        "default-preset" => "default",
        "default-position-x" => "left",
        "default-position-y" => "top",
        "default-size" => "auto",
        "default-repeat" => "repeat",
        "default-attachment" => "scroll",
        "default-color" => "",
        "wp-head-callback" => "_custom_background_cb",
        "admin-head-callback" => "",
        "admin-preview-callback" => ""
    ));

    add_theme_support("post-thumbnails");

    //定义Image size
    add_image_size("wqhd-size", 2560, 1440);
    add_image_size("fhd-size", 1920, 1080);
    add_image_size("hd-size", 1280, 720);
    add_image_size("avatar-large-size", 500, 500);
    add_image_size("avatar-medium-size", 250, 250);
    add_image_size("avatar-small-size", 125, 125);
}
endif;
add_action("after_setup_theme", "solitude_setup");

//注册Nav menus
register_nav_menus(
    array(
        'top' => __('Top Menu', 'solitude'),
        'sidebar' => __('Sidebar Menu,"solitude'),
        'social' => __('Social Links Menu', 'solitude')
    )
);

function solitude_widgets_init()
{
    register_sidebar(array(
        "name" => __("Sidebar left", "solitude-domain"),
        "id" => "sidebar-left",
        "description" => __("Add widgets here to appear in your left sidebar.", "solitude-domain"),
        "class" => "",
        "before_widget" => "<li class='widget-sidebar-left'>",
        "after_widget" => "</li>",
        "before_title" => "<h2 class='widget-title-sidebar-left'>",
        "after_title" => "</h2>"
    ));

    register_sidebar(array(
        "name" => __("Sidebar right", "solitude-domain"),
        "id" => "sidebar-right",
        "description" => __("Add widgets here to appear in your right sidebar.", "solitude-domain"),
        "class" => "",
        "before_widget" => "<li class='widget-sidebar-right'>",
        "after_widget" => "</li>",
        "before_title" => "<h2 class='widget-title-sidebar-right'>",
        "after_title" => "</h2>"
    ));

    register_sidebar(array(
        "name" => __("Sidebar bottom", "solitude-domain"),
        "id" => "sidebar-bottom",
        "description" => __("Add widgets here to appear in your bottom sidebar.", "solitude-domain"),
        "class" => "",
        "before_widget" => "<li class='widget-sidebar-bottom'>",
        "after_widget" => "</li>",
        "before_title" => "<h2 class='widget-title-sidebar-bottom'>",
        "after_title" => "</h2>"
    ));
}

add_action("widgets_init", "solitude_widgets_init");

/**
 * Ini
 */

function solitude_customize_register($wp_customize)
{
    $wp_customize->add_section("color_theme_section", array(
        'title' => __('Color theme', "solitude-domain")
    ));
}

add_action("customise_register", "solitude_customise_register");

/**
 * Enqueue scripts and styles.
 */
function solitude_scripts()
{
    wp_enqueue_style("basic-stylesheet", get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    wp_enqueue_style("bootstrap-grid", get_template_directory_uri() . '/assets/css/bootstrap-grid.min.css', array(), wp_get_theme()->get('Version'));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'solitude_scripts');

/**
 * Display custom color CSS in customizer and on frontend.
 */