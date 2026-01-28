<?php
/**
 * Plugin Name: BK Elementor Extension
 * Version: 1.0.0
 * Description: This is a Elementor Widgets extension.
 * Author: Bisnu Kundu
 * Author URI: https://bisnukundu.netlify.app/
 * Requires Plugins: elementor
 * 
 */

define("BK_EL_PATH", plugin_dir_path(__FILE__));
define("BK_EL_URL", plugin_dir_url(__FILE__));
class Bk_el_extension
{
    function __construct()
    {
        add_action('elementor/widgets/register', [$this, 'register_elementor_widget']);
        add_action('elementor/elements/categories_registered', [$this, 'bk_register_widget_category']);
        add_action('wp_enqueue_scripts', [$this, 'add_bk_styles_script']);
    }

    function register_elementor_widget($widgets_manager)
    {
        include_once(BK_EL_PATH . 'widgets/Bk_text_widget.php');
        $widgets_manager->register(new Bk_text_widget());
    }

    // Register New Category of Widgets
    function bk_register_widget_category($elements_manager)
    {
        $elements_manager->add_category(
            'bk-widget',
            [
                'title' => esc_html__("BK Widgets", 'bk-el-extension'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    // Register Style and Script 
    function add_bk_styles_script()
    {
        wp_register_style(
            'bk_text_style',
            BK_EL_URL . 'assets/css/style.css',
            [],
            time(),
        );
    }
}

new Bk_el_extension();