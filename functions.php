<?php

function galaxy_setup() {
    add_theme_support( "custom-logo", array(
        "width"      => 250,
        "height"     => 250,
        "flex-width" => true
    ) );
    
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
    
    add_theme_support( "html5", array(
        "search-form",
        "comment-form",
        "comment-list",
        "gallery",
        "caption"
    ) );
    
    add_theme_support( "post-formats", array(
        "aside",
        "audio",
        "gallery",
        "image",
        "link",
        "quote",
        "status",
        "video"
    ) );
    
    add_theme_support( "post-thumbnails" );
    //Add post thumbnails sizes
    add_image_size( "full-size", 9999, 9999 );
}

add_action( "after_setup_theme", "galaxy_setup" );

function galaxy_scripts() {
    //Noto Sans SC
    wp_enqueue_style( "galaxy-fonts-zh", "fonts.googleapis.com/earlyaccess/notosanssc.css" );
    //Noto Sans SC Sliced
    wp_enqueue_style( "galaxy-fonts-zh-sliced", "fonts.googleapis.com/earlyaccess/notosansscsliced.css" );
    //Noto Sans JP
    wp_enqueue_style( "galaxy-fonts-jp", "fonts.googleapis.com/earlyaccess/notosansjp.css" );
    //Roboto
    wp_enqueue_style( "galaxy-fonts-en", "fonts.googleapis.com/css?family=Roboto:300,400,500,700" );
    //Font Awesome
    wp_enqueue_style( "font-awesome", "assets/engine/font-awesome/css/font-awesome.min.css" );
    //Theme stylesheet
    wp_enqueue_style( "galaxy-style", get_stylesheet_uri() );
    //Add jQuery support
    wp_enqueue_script( "jQuery", "assets/engine/jQuery/jquery-3.2.1.min.js", "jQuery", "3.2.1", true );
    
    wp_enqueue_script( "galaxy-global", "assets/js/galaxy-global.js", "Global-Script", "1.0.0", true );
    
    
}

add_action( "wp_enqueue_scripts", "galaxy_scripts" );

function galaxy_widgets_init() {
    register_sidebar( array(
        "name"          => __( "Sidebar left", "Galaxy" ),
        "id"            => "sidebar-1",
        "description"   => __( "Add widgets here to appear in your left sidebar.", "Galaxy" ),
        "class"         => "",
        "before_widget" => "<li class='widget'>",
        "after_widget"  => "</li>",
        "before_title"  => "<h2 class='galaxy-widget-title'>",
        "after_title"   => "</h2>"
    ) );
    
    register_sidebar( array(
        "name"          => __( "Sidebar right", "Galaxy" ),
        "id"            => "sidebar-2",
        "description"   => __( "Add widgets here to appear in your right sidebar.", "Galaxy" ),
        "class"         => "",
        "before_widget" => "<li class='widget'>",
        "after_widget"  => "</li>",
        "before_title"  => "<h2 class='galaxy-widget-title'>",
        "after_title"   => "</h2>"
    ) );
    
    register_sidebar( array(
        "name"          => __( "Footer", "Galaxy" ),
        "id"            => "sidebar-3",
        "description"   => __( "Add widgets here to appear in your footer.", "Galaxy" ),
        "class"         => "",
        "before_widget" => "<li class='widget'>",
        "after_widget"  => "</li>",
        "before_title"  => "<h2 class='galaxy-widget-title'>",
        "after_title"   => "</h2>"
    ) );
}

add_action( "widgets_init", "galaxy_widgets_init" );
