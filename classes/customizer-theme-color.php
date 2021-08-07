<?php
/**
 * Customize Color Control class.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @see WP_Customize_Control
 */

class Solitude_Customizer_Theme_Color_Control extends WP_Customize_Color_Control
{
    /**
     * The control type.
     *
     * @since Solitude 1.0
     *
     * @var string
     */
    public $type = "solitude-theme-color";

    /**
     * Color picker palette
     *
     * @access public
     *
     * @since Solitude 1.0
     *
     * @var array
     */
    public array $palette;

    /**
     * Enqueue control related scripts/styles.
     *
     * @access public
     *
     * @return void
     * @since Solitude 1.0
     *
     */
    public function enqueue()
    {
        parent::enqueue();

        // Enqueue the script.
        wp_enqueue_script(
            "solitude-theme-color-picker",
            get_theme_file_uri("assets/js/palette-color-picker.js"),
            [
                "customize-controls",
                "jquery",
                "customize-base",
                "wp-color-picker",
            ],
            (string) filemtime(
                get_theme_file_path("assets/js/palette-color-picker.js")
            ),
            false
        );
    }

    /**
     * Refresh the parameters passed to the JavaScript via JSON.
     *
     * @access public
     *
     * @return void
     * @uses WP_Customize_Control::to_json()
     *
     * @since Twenty Twenty-One 1.0
     *
     */
    public function to_json()
    {
        parent::to_json();
        $this->json()["palette"] = $this->palette;
    }
}
