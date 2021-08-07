<?php
/**
 * Solitude Theme Customizer
 *
 * @package Starry Solitude Studio
 * @subpackage Solitude
 * @since 1.0
 */

if (!class_exists("Solitude_Customizer")) {
    /**
     * Customizer Settings.
     *
     * @since Solitude 1.0
     */
    class Solitude_Customizer
    {
        /**
         * Constructor. Instantiate the object.
         *
         * @access public
         * @since Twenty Twenty-One 1.0
         */
        public function __construct()
        {
            add_action("customize_register", [$this, "register"]);
        }

        /**
         * Register customizer.js options.
         *
         * @access public
         *
         * @param WP_Customize_Manager $wp_customize Theme Customizer object.
         *
         * @return void
         * @since 1.0
         */
        public function register($wp_customize)
        {
            // Change site-title & description to postMessage.
            $wp_customize->get_setting("blogname")->transport = "postMessage";
            $wp_customize->get_setting("blogdescription")->transport =
                "postMessage";

            // Add partial for blogname.
            $wp_customize->selective_refresh->add_partial("blogname", [
                "selector" => ".site-title",
                "render_callback" => [$this, "partial_blogname"],
            ]);

            // Add partial for blogdescription.
            $wp_customize->selective_refresh->add_partial("blogdescription", [
                "selector" => ".site-description",
                "render_callback" => [$this, "partial_blogdescription"],
            ]);
        }
    }
}
