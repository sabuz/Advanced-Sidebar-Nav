<?php
/**
 * Plugin Name: Advanced Sidebar Nav
 * Description: The best way to display navigation menus on sidebar, no matter how many depth!
 * Version: 1.1
 * Author: Nazmul Sabuz
 * Author URI: https://profiles.wordpress.org/nazsabuz/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

final class Advanced_Sidebar_Nav
{
    protected static $instance = null;

    protected function __construct()
    {
        // methods
        $this->load_files();

        // actions
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('widgets_init', array($this, 'register_widget'));
    }

    // create instance
    public static function instance()
    {
        if (self::$instance == null) {
            $instance = new self;
        }

        return $instance;
    }

    // load required files
    public function load_files()
    {
        require_once plugin_dir_path(__FILE__) . 'inc/options.php';
        require_once plugin_dir_path(__FILE__) . 'inc/widget.php';
    }

    // register assets
    public function enqueue_scripts()
    {
        wp_register_style('advanced-sidebar-nav', plugin_dir_url(__FILE__) . 'assets/advanced-sidebar-nav.css');
        wp_register_script('advanced-sidebar-nav', plugin_dir_url(__FILE__) . 'assets/advanced-sidebar-nav.js');
    }

    // register wp widget
    public function register_widget()
    {
        register_widget('Advanced_Sidebar_Nav_Widget');
    }
}

add_action('plugins_loaded', function () {
    Advanced_Sidebar_Nav::instance();
});
