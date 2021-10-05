<?php
/**
 * Solitude functions and definitions
 *
 * @package Starry Solitude Studio
 * @subpackage Solitude
 * @since 1.0-RELEASE
 */

/**
 * Solitude only works in WordPress 5.2 or later.
 */
if (version_compare($GLOBALS["wp_version"], "5.3", "<")) {
    require get_template_directory() . "/inc/back-compat.php";

    return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if (!function_exists("solitude_setup")) {
    function solitude_setup() {
        // Set the default content width.
        $GLOBALS["content_width"] = 525;

        //Make theme available for translation.
        load_theme_textdomain("solitude", get_template_directory() . "/languages");

        // Add default posts and comments RSS feed links to <head>.
        add_theme_support("automatic-feed-links");

        //Switch default core markup for search form, comment form, and comments to output valid HTML5.
        add_theme_support("html5", [
            "search-form",
            "comment-form",
            "comment-list",
            "gallery",
            "caption",
            "style",
            "script",
            "navigation-widgets",]);

        // Add theme support for post thumbnails and featured images.
        add_theme_support("post-thumbnails");

        // Add theme support for selective refresh for widgets.
        add_theme_support("customize-selective-refresh-widgets");

        add_theme_support("custom-background", [
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
            "admin-preview-callback" => "",]);

        //Define Image size
        add_image_size("wqhd-size", 2560, 1440);
        add_image_size("fhd-size", 1920, 1080);
        add_image_size("hd-size", 1280, 720);
        add_image_size("avatar-large-size", 500, 500);
        add_image_size("avatar-medium-size", 250, 250);
        add_image_size("avatar-small-size", 125, 125);
    }
}

add_action("after_setup_theme", "solitude_setup");

/**=====================================================================================================*/
//Register custom header setup and default settings
function solitude_custom_header_setup() {
    $defaults = [
        // Default Header Image to display
        "default-image"          => get_template_directory_uri() . "/assets/images/default_background.png",
        // Display the header text along with the image
        "header-text"            => TRUE,
        // Header text color default
        "default-text-color"     => "000",
        // Header image width (in pixels)
        "width"                  => 1920,
        // Header image height (in pixels)
        "height"                 => 1080,
        // Header image random rotation default
        "random-default"         => FALSE,
        // Enable upload of image file in admin
        "uploads"                => FALSE,
        // function to be called in theme head section
        "wp-head-callback"       => "wp_head_cb",
        //  function to be called in preview page head section
        "admin-head-callback"    => "admin_head_cb",
        // function to produce preview markup in the admin screen
        "admin-preview-callback" => "admin_preview_cb",];

    // Add theme support for Custom Header.
    add_theme_support("custom-header", $defaults);
}

add_action("after_setup_theme", "solitude_custom_header_setup");

/**=====================================================================================================*/
//Register custom logo setup and default settings
function solitude_custom_logo_setup() {
    $defaults = [
        "height"               => 100,
        "width"                => 400,
        "flex-height"          => TRUE,
        "flex-width"           => TRUE,
        "header-text"          => [
            "site-title",
            "site-description"],
        "unlink-homepage-logo" => TRUE,];

    // Add theme support for Custom Logo.
    add_theme_support("custom-logo", $defaults);
}

add_action("after_setup_theme", "solitude_custom_logo_setup");

/**=====================================================================================================*/
//Register navigation menus
function register_navigation_menus() {
    register_nav_menus([
        "header-menu" => __("Header Menu"),
        "extra-menu"  => __("Extra Menu"),]);
}

add_action("after_setup_theme", "register_navigation_menus");

/**=====================================================================================================*/
//Register support post formats
function solitude_post_formats_setup() {
    //Add theme support for post formats.
    add_theme_support("post-formats", [
        "aside",
        "audio",
        "video",
        "image",
        "gallery",
        "link",
        "quote",
        "status",]);
}

add_action("after_setup_theme", "solitude_post_formats_setup");

/**=====================================================================================================*/
//Register widgets
function solitude_widgets_init() {
    register_sidebar([
        "name"          => __("Sidebar left", "solitude-domain"),
        "id"            => "sidebar-left",
        "description"   => __("Add widgets here to appear in your left sidebar.", "solitude-domain"),
        "class"         => "",
        "before_widget" => "<li class='widget-sidebar-left'>",
        "after_widget"  => "</li>",
        "before_title"  => "<h2 class='widget-title-sidebar-left'>",
        "after_title"   => "</h2>",]);

    register_sidebar([
        "name"          => __("Sidebar bottom", "solitude-domain"),
        "id"            => "sidebar-bottom",
        "description"   => __("Add widgets here to appear in your bottom sidebar.", "solitude-domain"),
        "class"         => "",
        "before_widget" => "<li class='widget-sidebar-bottom'>",
        "after_widget"  => "</li>",
        "before_title"  => "<h2 class='widget-title-sidebar-bottom'>",
        "after_title"   => "</h2>",]);
}

add_action("widgets_init", "solitude_widgets_init");

/**=====================================================================================================*/
//Enqueue scripts and styles.
function solitude_scripts() {
    wp_enqueue_style("style", get_stylesheet_uri(), [], wp_get_theme() -> get("Version"));
    wp_enqueue_style("grid", get_template_directory_uri() . "/assets/css/grid/bootstrap-grid.min.css", [], "v5.0.2");
    wp_enqueue_script("jquery");
    wp_enqueue_script("backbone");

    if (is_home() || is_front_page()) {
        wp_enqueue_style("full-page-scrolling-style", get_template_directory_uri() . "/assets/css/tools/full-page-scrolling.css", [], "v1.0.0");
        wp_enqueue_script("full-page-scrolling-script", get_template_directory_uri() . "/assets/js/full-page-scrolling.js", [], "v1.0.0");
    }

    if (is_singular() && comments_open() && get_option("thread_comments")) {
        wp_enqueue_script("comment-reply");
    }
}

add_action("wp_enqueue_scripts", "solitude_scripts");

/**
 * Display custom color CSS in customizer.js and on frontend.
 */
